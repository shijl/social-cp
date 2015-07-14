<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class PluginController extends Controller
{
	
	public function actionIndex()
	{
		echo 3222;exit;
	}
    
	// public $layout = false;
	
    public function actionOperate()
    {
    	if(isset($_GET['ajax'])) {
    		$re = array(0=>array('plugin_name'=>'插件1','status'=>'开启')); 
    		echo json_encode($re);
    	} else {
    		return $this->render('operate');
    	}
    }
}
