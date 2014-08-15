<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/main'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * Return data to browser as JSON and end application.
     * @param array $data
     */
    protected function renderJSON($data)
    {
        $this->layout=false;
        header('Content-Type: application/json; charset="UTF-8";Access-Control-Allow-Origin: *');
        echo CJSON::encode($data);
        Yii::app()->end();
    }
}
