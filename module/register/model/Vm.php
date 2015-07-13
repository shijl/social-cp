<?php
namespace app\module\register\model;

use Yii;

class Vm extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'vm';
	}
	
	public function rules()
	{
		return [
			[['user_name'],'string'],
			[['hard_disk','memory','cpu','system'],'integer'],
			[['hard_disk','memory','cpu','system','user_name'],'required']
		];
	}
	
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_name' => '用户名',
			'hard_disk' => '硬盘大小',
			'memory' => '内存大小',
			'cpu' => 'cpu内核数',
			'system' => '操作系统',
		];
	}
}

