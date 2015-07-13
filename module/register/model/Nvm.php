<?php
namespace app\module\register\model;

use Yii;

class Nvm extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'nvm';
	}
	
	public function rules()
	{
		return [
			[['host'],'string'],
			[['ip_address','host'],'required']
		];
	}
	
	public function attributeLabels()
	{
		return [
			'ip_address' => 'IP地址',
			'host' => '域名',
		];
	}
}

