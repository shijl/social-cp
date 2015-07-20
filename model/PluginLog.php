<?php

namespace app\model;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cp_plugin_log".
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
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plugin_name','project_name','download_status','time'], 'required'],
            [['plugin_name','project_name'], 'string'],
            [['download_status','time'], 'integer'],
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