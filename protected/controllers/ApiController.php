<?php

class ApiController extends Controller
{
    public function actionSearch($line){
        $api = $this->find_api($line);
        $base = $this->find_db($line);
        $results = array_merge($base,$api);
        $this->renderJSON($results);
    }

    private function find_db($line){
        $connection = Yii::app()->db;
        $firms = $connection->createCommand()
            ->select('id, name, address, latitude, longitude')
            ->from('firm')
            ->where("position(:line in lower(name)) + position(:line in lower(address)) > 0",
                array(':line' => mb_strtolower($line, 'utf-8')))
            ->queryAll();
        return $firms;
    }

    private function find_api($line){
        $url="http://catalog.api.2gis.ru/2.0/catalog/branch/search?q=".$line."&region_id=1&key=rubdmw6768&fields=items.point,items.org";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $firm_list = curl_exec($ch);
        curl_close($ch);
        $firm_list=json_decode($firm_list);
        if($firm_list->meta->code==200){
            $count=$firm_list->result->total;
            if ($count>10){
                $count=10;
            }
            for ($i=0;$i<$count;$i++){//отчет с 0, переменная total с 1;
                $list[$i]['id'] = $firm_list->result->items[$i]->org->id;
                $list[$i]['longitude'] = $firm_list->result->items[$i]->point->lon; //Долгота координаты
                $list[$i]['latitude'] = $firm_list->result->items[$i]->point->lat; //Широта координаты
                $list[$i]['name'] = $firm_list->result->items[$i]->name;
                $list[$i]['address'] = $firm_list->result->items[$i]->address_name;
            }
            return $list;
        }
        return array();
    }
}