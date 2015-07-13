<?php
namespace app\module\login\model;

use Yii;

class Plugin extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'plugin';
	}
	
	public function rules()
	{
		return [
			[['plugin','function_model'],'string'],
		];
	}
	
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'plugin' => '插件',
			'function_model' => '模块',
		];
	}
}

