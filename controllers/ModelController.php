<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ModelController extends Controller
{
	public $enableCsrfValidation = false;
    public function actionIndex()
    {
    	$model_view = new \app\model\Model_view();
    	$view_id = isset($_GET['view_id']) ? $_GET['view_id'] : '';
    	if(empty($view_id) || ($view = $model_view->get_model_view($view_id)) == false) {
    		echo '模块视图不存在';exit;
    	}
    	// 查询数据库
        return $this->render('index', ['view_id'=>$view_id]);
    }
    
    
    public function actionSearch()
    {
    	$pro = isset($_GET['p']) ? $_GET['p'] : '';
    	$view_id = isset($_GET['view_id']) ? $_GET['view_id'] : '';
    	if(empty($pro) || empty($view_id)) {
    		echo '查询参数错误';exit;
    	}
    	
    	$model_view = new \app\model\Model_view();
    	if(($view = $model_view->get_model_view($view_id)) == false) {
    		echo '模块视图不存在';exit;
    	}
    	
    	// 查询项目的配置信息
    	$project_obj = new \app\model\Project();
    	if(($project_info = $project_obj->get_project('project_name', $pro)) == false) {
    		echo '项目不存在';exit;
    	}
    	return $this->render('field', ['project'=>$pro, 'view_id'=>$view_id]);
    }
    
    public function actionField()
    {
    	$pro = isset($_GET['p']) ? $_GET['p'] : '';
    	$view_id = isset($_GET['view_id']) ? $_GET['view_id'] : '';
    	// 查询模块视图的配置字段
    	$model_view = new \app\model\Model_view();
    	if(($view = $model_view->get_model_view($view_id)) == false) {
    		echo '模块视图不存在';exit;
    	}
    	
    	// 查询项目的配置信息
    	$project_obj = new \app\model\Project();
    	if(($project_info = $project_obj->get_project('project_name', $pro)) == false){
    		echo '项目不存在';exit;
    	}
    	
    	// 查询项目的配置信息
    	$config_field = array();
    	$pro_config_obj = new \app\model\Project_config();
    	$config_info = $pro_config_obj->get_field_config($project_info['id'], $view['id']);
    	if($config_info && !empty($config_info['config_field'])) {
    		$config_field = explode(',', $config_info['config_field']);
    	}
    	
    	
    	// 查询所有字段信息
    	$field_obj = new \app\model\Field();
    	$field_info = $field_obj->get_info_fieldid($view['field']);
    	
    	foreach ($field_info as $vk=>$vv) {
    		$extra = '';
    		$field_info[$vk]['group'] = $vv['field_group'];
    		if(!empty($vv['extra']) && ($extra_arr = unserialize($vv['extra'])) != false) {
    			foreach ($extra_arr as $ek=>$ev) {
    				$extra .= $ek.':'.$ev.';';
    			}
    		}
    		$field_info[$vk]['extra_info'] = $extra;
    		if(in_array($vv['id'], $config_field)) {
    			$field_info[$vk]['checked'] = true;
    		} else {
    			$field_info[$vk]['checked'] = false;
    		}
    	}
    	
    	$data = array("total"=>count($field_info), "rows"=>$field_info, 'project_info'=>$project_info);
    	echo json_encode($data);
    }
    
    
}
