<?php
namespace app\model;

use yii\base\Object;

/**
 * Success成功信息类
 */
class Success extends Object
{
	public $success = true;
	
	/**
	 * 返回成功信息的数组
	 * @return array
	 */
	public function toArray() {
		return ['success' => $this->success];
	}
	
}