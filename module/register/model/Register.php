<?php
namespace app\module\register\model;

use Yii;

class Register extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'register';
	}
	
	public function rules()
	{
		return [
			[['company_name','leader','project_name'],'string'],
			[['company_name','leader','project_name','end_date'],'required'],
			[['end_date'],'safe']
		];
	}
	
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'company_name' => '公司名称',
			'leader' => '负责人',
			'project_name' => '项目名称',
			'end_date' => '使用截止日期',
			'reg_time' => 'Reg Time',
			'reg_user' => 'Reg User',
			'vm' => '是否有VM',
		];
	}
}

