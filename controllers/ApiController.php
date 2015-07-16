<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class ApiController extends Controller
{
	private $_project_obj = null;
	private $_model_obj = null;
	private $_view_obj = null;
	private $_config_obj = null;
	private $_field_obj = null;
	
	public function init()
	{
		$this->_project_obj = new \app\model\Project();
		$this->_model_obj = new \app\model\Model();
		$this->_view_obj = new \app\model\Model_view();
		$this->_config_obj = new \app\model\Project_config();
		$this->_field_obj = new \app\model\Field();
	}
	
	
	public function actionGet_model_config()
	{
		$project_name = isset($_GET['project_name']) ? $_GET['project_name'] : '';
		$model_name = isset($_GET['model_name']) ? $_GET['model_name'] : '';
		$view_name = isset($_GET['view_name']) ? $_GET['view_name'] : '';
		
		if(empty($project_name) || empty($model_name) || empty($view_name)) {
			echo json_encode(array('code'=>'1001', 'data'=>'参数有误'));
			exit;
		}
		
		// 查询项目id
		$project_info = $this->_project_obj->get_project('project_name', $project_name);
		if(!$project_info) {
			echo json_encode(array('code'=>'1002', 'data'=>'项目不存在'));
			exit;
		}
		// 模块信息
		$model_info = $this->_model_obj->get_model('model_name', $model_name);
		if(!$model_info) {
			echo json_encode(array('code'=>'1003', 'data'=>'模块不存在'));
			exit;
		}
		// 视图信息
		$view_info = $this->_view_obj->get_view_info($model_info['id'], $view_name);
		if(!$view_info) {
			echo json_encode(array('code'=>'1004', 'data'=>'视图不存在'));
			exit;
		}
		
		// 项目id，视图id查询配置信息
		$config_info = $this->_config_obj->get_field_config($project_info['id'], $view_info['id']);
		if(!$config_info && !empty($config_info['config_field'])) {
			echo json_encode(array('code'=>'1005', 'data'=>'无配置信息'));
			exit;
		}
		
		$config_field = $this->_field_obj->get_info_fieldid($config_info['config_field']);
		if(!$config_field) {
			echo json_encode(array('code'=>'1005', 'data'=>'无配置信息'));
			exit;
		}
		$config = array();
		foreach ($config_field as $ck=>$cv) {
			$tmp['name'] = $cv['field_value'];
			$tmp['extra'] = !empty($cv['extra']) ? unserialize($cv['extra']) : array();
			$config[$cv['field_group']][] = $tmp;
		}
		
		echo json_encode(array('code'=>'1000', 'data'=>$config));
	}
}