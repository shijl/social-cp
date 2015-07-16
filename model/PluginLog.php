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
class PluginLog extends ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cp_plugin_log';
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
            [['id', 'project_id', 'plugin_id','plugin_name','project_name','download_status','time'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => '项目名称',
            'plugin_id' => '插件id',
            'plugin_name' => '插件名称',
            'project_name' => '项目名称',
            'download_status' => '下载状态',
            'time' => '下载时间',
        ];
    }
}