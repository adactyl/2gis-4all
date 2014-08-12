<?php

class ApiController extends Controller
{
	public function actionSearch()
	{
        $this->renderJSON(array(
            'id' => 123456789,
            'name' => 'Пивоварня',
            'address' => 'Новосибирск, Красный проспект, 26',
            'geo' => array(
                'lon' => 54.123456,
                'lat' => 55.123456
            )));
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