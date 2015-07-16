<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class IndexController extends Controller
{
    
	private $_model_obj = null;
	private $_view_obj = null;
	
	public function init()
	{
		$this->_model_obj = new \app\model\Model();
		$this->_view_obj = new \app\model\Model_view();
	}
	
	
    public function actionIndex()
    {
    	// include_once 'update_field.php';
		// all model
		$model = $this->_model_obj->get_all();
		if(!empty($model)) {
			foreach ($model as $mk=>$mv) {
				$model[$mk]['view'] = $this->_view_obj->get_all('model_id', $mv['id']);
			}
		}
        return $this->render('index', ['model'=>$model]);
    }
}
