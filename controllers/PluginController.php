<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\model\Plugin;
use app\model\PluginLog;
use app\model\Success;
use app\model\Error;

class PluginController extends Controller
{

	public $enableCsrfValidation = false;
	public function actionIndex(){
		if(Yii::$app->request->post()){
			$query = Plugin::find();
			$models = $query->all();
			$output=[];
			foreach($models as $model){
				$item = [
				'id' =>$model->id,
				'plugin_name' =>$model->plugin_name,
				'plugin_file_name' =>$model->plugin_file_name,
				'plugin_type' =>$model->plugin_type,
				'plugin_status' =>$model->plugin_status,
				'description' =>$model->description,
				'created_at' =>$model->created_at,
				];
				$output[]=$item;
			}
			return $this->renderContent(json_encode($output));
		}else {
			return $this->render('index');
		}
	}
	public function actionUpdate(){
		//$param = $request->getBodyParam('id');
		$id = \Yii::$app->getRequest()->post('id');
		$status = \Yii::$app->getRequest()->post('status');
		if(empty($id)||empty($status))
		{
			$error = new Error(Error::CODE_PARAMETER_ERROR);
			return $this->renderContent(json_encode($error->toArray()));
		}
		$model = Plugin::findOne(['id' => $id]);
		if($model === null)
		{
			$error = new Error(Error::CODE_OBJECT_NOT_FOUND);
			return $this->renderContent(json_encode($error->toArray()));
		}
		
		$model->plugin_status = $status;
		if(!$model->save()) {
			$error = new Error(Error::CODE_UPDATE_FAILED);
			return $this->renderContent(json_encode($error->toArray()));
		}
		
		$success = new Success();
		return $this->renderContent(json_encode($success->toArray()));
	}
	public function actionPluginLog(){
		if(Yii::$app->request->post()){
			$plugin_name = Yii::$app->getRequest()->post('plugin_name');
			$project_name = Yii::$app->getRequest()->post('project_name');
			$download_status = Yii::$app->getRequest()->post('download_status');
			$condition=[];
			
			if($plugin_name){
				$condition['plugin_name'] = $plugin_name;
			}
			if($project_name){
				$condition['project_name'] = $project_name;
			}
			if($download_status){
				$condition['download_status'] = $download_status;
			
			}
			$query = PluginLog::find()->where($condition);
			$query->orderBy('time DESC');
			$models = $query->all();
			$output=[];
			foreach($models as $model){
				$item = [
				'id' =>$model->id,
				'plugin_id' =>$model->plugin_id,
				'plugin_name' =>$model->plugin_name,
				'project_id' =>$model->project_id,
				'project_name' =>$model->project_name,
				'download_status' =>$model->download_status,
				'time' =>$model->time,
				];
				$output[]=$item;
			}
			return $this->renderContent(json_encode($output));
		}else {
			return $this->render('plugin_log');
		}
	}
}
