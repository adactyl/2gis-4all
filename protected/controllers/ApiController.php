<?php

class ApiController extends Controller
{
    public function actionSearch($line){
	ini_set('display_errors',1);
	error_reporting(E_ALL ^E_NOTICE);
        $api = $this->find_api($line);
        $base = $this->find_db($line);
        $results = array_merge($base,$api);
        $this->renderJSON($results);
    }

    private function find_db($line){
        $connection = Yii::app()->db;
        $firms = $connection->createCommand()
            ->select(array('id', 'name', 'address', 'latitude', 'longitude'))
            ->from('firm')
            ->where("position(:line in lower(name)) + position(:line in lower(address)) > 0",
                array(':line' => mb_strtolower($line, 'utf-8')))
            ->queryAll();
	    foreach($firms as &$firm){
		    $firm['from'] = 'db';
	    }
	    unset($firm);
        return $firms;
    }

    /** Функция self-assignment. Не позволяет обратиться к несуществующему полю.
     * В случае если поле не существует, то записывает в ссответствующее поле
     * левостороннего массива NULL.
     * Передача массивов по ссылке
     * @param $left_array - массив в который пишем
     * @param $left_key - ключ по которому пишем
     * @param $right_array - массив из которого читаем
     * @param $right_key - ключ по которому читаем
     * @return void
     */
    private function set_array_value(&$left_array, $left_key, &$right_array, $right_key){
        if($right_array == null){
            $left_array[$left_key] = null;
            return;
        }
        if(array_key_exists($right_key, $right_array) == false){
            $left_array[$left_key] = null;
        }
        else{
            $left_array[$left_key] = $right_array->$right_key;
        }
    }

    /** Удаление hash-значения из id.
     * @param $id - строка хранящая id.
     */
    private function remove_hash(&$id){
        $result_array = explode('_', $id);
	return (int)$result_array[0];
    }

    private function find_api($line){
        $max_answer_count = 20;
        $url = "http://catalog.api.2gis.ru/2.0/catalog/branch/search?q=".$line."&region_id=1&key=rubdmw6768&fields=items.point,items.org";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $firm_list = curl_exec($ch);
        curl_close($ch);
        $firm_list = json_decode($firm_list);
        if($firm_list->meta->code == 200){
            $count = $firm_list->result->total;
            if ($count > $max_answer_count){
                $count = $max_answer_count;
            }
            for ($i = 0; $i < $count; $i++){
                $current_elem = &$firm_list->result->items[$i];
                $list[$i]['id'] = $this->remove_hash($current_elem->id);
                $this->set_array_value($list[$i], 'name', $current_elem, 'name');
                $this->set_array_value($list[$i], 'address', $current_elem, 'address_name');
                $this->set_array_value($list[$i], 'latitude', $current_elem->point, 'lat');
		        $this->set_array_value($list[$i], 'longitude', $current_elem->point, 'lon');
               	$list[$i]['from'] = 'api'; 
            }
            return $list;
        }
        return array();
    }
}
