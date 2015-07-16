<?php
namespace app\model;

use Yii;

class Model_view
{
	public function get_model_view($view_id)
	{
		if(empty($view_id)) return false;
		$sql = "select * from cp_model_view where id = '$view_id'";
		
		$db = Yii::$app->db;
		$command = $db->createCommand($sql);
		$posts = $command->queryOne();
		
		return $posts;
	}
	
	
	// 根据视图名和模块id查询信息
	public function get_view_info($model_id, $view_name) 
	{
		if(empty($model_id) || empty($view_name)) return false;
		$sql = "select * from cp_model_view where model_id=:model_id and view_name=:view_name";

		$command = Yii::$app->db->createCommand($sql);
		$command->bindParam(':model_id', $model_id);
		$command->bindParam(':view_name', $view_name);
		return $command->queryOne();
	}
	
	public function get_all($field='', $value='')
	{
		$sql = "select * from cp_model_view ";
		if(!empty($field))
			$sql .= "where $field = '$value'";
		
		return Yii::$app->db->createCommand($sql)->queryAll();
	}
}