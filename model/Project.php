<?php
namespace app\model;

use Yii;

class Project
{
	public function get_project($field, $value)
	{
		if(empty($field) || empty($value))
			return false;
		
		$sql = "select * from cp_project where $field = '$value'";
		
		return Yii::$app->db->createCommand($sql)->queryOne();
	}
	
	public function save_project($project_info)
	{
		if(empty($project_info)) return false;
		
		$project_name = $project_info['project_name'];
		$create_time = date("Y-m-d H:i:s");
		
		$sql = "insert into cp_project (project_name, create_time) values (:project_name, '$create_time')";
		
		$command = Yii::$app->db->createCommand($sql);
		$command->bindParam(':project_name', $project_name);
		return $command->execute();
	}
}