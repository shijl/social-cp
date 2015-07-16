<?php
namespace app\model;

use Yii;

class Project_config
{
	public function get_field_config($project_id, $model_view_id) 
	{
		if(empty($project_id) || empty($model_view_id)) return false;
		$sql = "select * from cp_project_config where project_id = '$project_id' and model_view_id = '$model_view_id'";

		$command = Yii::$app->db->createCommand($sql);
		$posts = $command->queryOne();
		
		return $posts;
	}
	
	public function save_config($field_arr)
	{
		if(empty($field_arr)) {
			return false;
		}
		$create_time = date("Y-m-d H:i:s");
		// 查询是否有数据
		if(($this->get_field_config($field_arr['project_id'], $field_arr['model_view_id']) != false)) {
			$sql = "update cp_project_config set config_field=:config_field, create_time='$create_time' 
					where project_id=:project_id and model_view_id=:model_view_id";
		} else {
			$sql = "insert into cp_project_config (project_id, model_view_id, config_field, create_time) 
					values (:project_id, :model_view_id, :config_field, '$create_time')";
		}
		$command = Yii::$app->db->createCommand($sql);
		$command->bindParam(':project_id', $field_arr['project_id']);
		$command->bindParam(':model_view_id', $field_arr['model_view_id']);
		$command->bindParam(':config_field', $field_arr['config_field']);
		
		return $command->execute();
		
		
	}
}