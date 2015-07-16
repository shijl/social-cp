<?php
namespace app\model;

use Yii;

class Model
{
	public function getViewName()
	{
		return true;
	}
	
	public function get_model($field, $value)
	{
		if(empty($field) || empty($value))
			return false;
		
		$sql = "select * from cp_model where $field = '$value'";
		
		return Yii::$app->db->createCommand($sql)->queryOne();
	}
	
	public function get_all($field='', $value='')
	{
		$sql = "select * from cp_model ";
		if(!empty($field))
			$sql .= "where $field = '$value'";
		
		return Yii::$app->db->createCommand($sql)->queryAll();
	}
	
}