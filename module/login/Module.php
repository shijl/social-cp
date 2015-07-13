<?php
namespace app\module\login;

class Module extends \yii\base\Module
{

	public function init()
	{
		// 加载插件注册为全局变量
		
		parent::init();
		
		\Yii::configure($this, require(__DIR__.'/config/web.php'));
		
		//$this->add_action('login', array((new \app\module\login\plugin\weixin_check()), 'check'),1);
		//$this->add_action('login', array((new \app\module\login\plugin\login_plugin()), 'login'),2);
		//$this->add_action('login', array((new \app\module\login\plugin\weibo_check()), 'check'),1);
	}
	
	public function add_action($tag, $function, $num)
	{
		global $filter;
		
		$filter[$tag][] = array('function'=>$function, 'num'=>$num);
	}
	
	public function build_unique_id($function)
	{
		$obj_idx = get_class($function[0]).$function[1];
		return $obj_idx;
	}
}