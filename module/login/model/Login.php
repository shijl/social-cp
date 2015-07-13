<?php
namespace app\module\login\model;

use Yii;

class Login extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'vm';
	}
	
	public function rules()
	{
		return [
			[['user_name','password'],'string'],
			[['user_name','password'],'required'],
		];
	}
	
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_name' => '用户名',
			'password' => '密码',
		];
	}
}

