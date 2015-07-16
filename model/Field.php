<?php
namespace app\model;

use Yii;

class Field
{
	public function get_field($field, $value)
	{
		if(empty($field) || empty($value))
			return false;
		
		$sql = "select * from cp_field where $field = '$value'";
		
		return Yii::$app->db->createCommand($sql)->queryAll();
	}
	
	public function get_info_fieldid($ids)
	{
		if(empty($ids))
			return false;
		
		$sql = "select * from cp_field where id in ($ids)";
		
		return Yii::$app->db->createCommand($sql)->queryAll();
	}
}