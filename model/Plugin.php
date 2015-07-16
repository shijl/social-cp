<?php

namespace app\model;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cp_plugin".
 *
 * @property integer $id
 */
class Plugin extends ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cp_plugin';
    }
    
    public function behaviors()
    {
    	return [
    		TimestampBehavior::className(),
    	];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'plugin_name', 'plugin_file_name','plugin_status','plugin_type','created_at',], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plugin_name' => '插件名称',
            'plugin_file_name' => '插件文件名',
            'plugin_type' => '插件类型',
            'plugin_status' => '插件状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'description' => '插件描述',
        ];
    }
}