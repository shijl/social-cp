<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class FieldController extends Controller
{
	public function actionSave()
	{
		$fields = isset($_GET['fields']) ? $_GET['fields'] : '';
		$project_id = isset($_GET['project_id']) ? $_GET['project_id'] : '';
		$view_id = isset($_GET['view_id']) ? $_GET['view_id'] : '';
		if(empty($project_id) || empty($view_id)) {
			echo json_encode(array('code'=>0,'data'=>'failure'));
			exit;
		}
// 		$fields_arr = explode(',', $fields);
// 		$item_arr = array();
// 		foreach ($fields_arr as $fk=>$fv) {
// 			$item = explode('/', $fv);
// 			$item_arr[$item[1]][] = $item[0];
// 		}
		
		$field_arr['project_id'] = $project_id;
		$field_arr['model_view_id'] = $view_id;
		$field_arr['config_field'] = !empty($fields) ? $fields : '';
		$project_config = new \app\model\Project_config();
		
		$re = $project_config->save_config($field_arr);
		
		if($re) {
			echo json_encode(array('code'=>1,'data'=>'success'));
		} else {
			echo json_encode(array('code'=>0,'data'=>'failure'));
		}
	}
}