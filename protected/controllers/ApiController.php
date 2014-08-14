<?php

class ApiController extends Controller
{
	public function actionSearch($line)
	{
        //select * from firm where position('Площадь' in "name") + position('Площадь' in "address") > 0;
        //position('Площадь' in "name") + position('Площадь' in "address")
        $connection = Yii::app()->db;
        $firms = $connection->createCommand()
            ->select('id, name, address')
            ->from('firm')
            ->where("position(:line in lower(name)) + position(:line in lower(address)) > 0",
                array(':line' => mb_strtolower($line, 'utf-8')))
            ->queryAll();
        /* Example
        $this->renderJSON(array(
            'id' => 123456789,
            'name' => $firm,
            'address' => 'Новосибирск, Красный проспект, 26',
            'geo' => array(
                'lon' => 54.123456,
                'lat' => 55.123456
            )));

        */
        $this->renderJSON($firms);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}