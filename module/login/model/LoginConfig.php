<?php
namespace app\module\login\model;

use Yii;

class LoginConfig extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'login_conf';
	}
	
	public function rules()
	{
		return [
			[['configure'],'integer'],
			[['configure'],'required'],
		];
	}
	
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'model' => '模型',
			'configure' => '配置',
		];
	}
}

