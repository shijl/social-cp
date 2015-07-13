<?php
namespace app\module\login\controllers;

use Yii;
use yii\web\Controller;
use app\module\login\model\LoginConfig;

class ConfigController extends Controller
{
	
	public function actionIndex()
	{
		$info = '';
		if(isset($_POST['subm'])) {
			$weixin = $_POST['weixin'];
			if($weixin == 1) {
				// 微信验证
				$info .= '微信验证';
				$this->add_action('login', 'weixin');
			} else {
				// 去掉微信验证
				$info .= '无微信验证';
				$this->del_action('login');
			}
// 			$info .= '  ';
// 			$login = $_POST['login'];
// 			if($login == 1) {
// 				// 普通验证
// 				$info .= '普通验证';
// 				$this->add_action('login', array((new \app\module\login\plugin\login_plugin()), 'login'),2);
// 			} else {
// 				// 去掉普通验证
// 				$info .= '无普通验证';
// 				$this->del_action('login', array((new \app\module\login\plugin\login_plugin()), 'login'));
// 			}
			
			return $this->render('/info/index',['info'=>$info.'配置成功']);
		} else {
			return $this->render('index');
		}
	}
	
	public function add_action($tag, $function)
	{
		// $idx = $this->build_unique_id($function);
		
		// $tmp = Yii::$app->session[$tag];
		// $tmp[$idx] = array('function'=>$function, 'num'=>$num);
		
		// Yii::$app->session[$tag] = $tmp;
		
		// $plugin = new \app\module\login\model\Plugin();
		
		$plugin = \app\module\login\model\Plugin::findOne(['plugin'=>$tag]);
		if(empty($plugin)){
			$plugin = new \app\module\login\model\Plugin();
		}
		
		$plugin->plugin = $tag;
		$plugin->function_model = $function;
		
		return $plugin->save();
		
		
		//var_dump(Yii::$app->session[$tag]);exit;
	}
	
	public function del_action($tag)
	{
		//$idx = $this->build_unique_id($function);
		
		//$tmp = Yii::$app->session[$tag];
		//unset($tmp[$idx]);
		//Yii::$app->session[$tag] = $tmp;
		
		$plugin = \app\module\login\model\Plugin::findOne(['plugin'=>$tag]);
		if(!empty($plugin)){
			$plugin->function_model = '';
			return $plugin->save();
		}
		return true;
	}
	
	public function build_unique_id($function)
	{
		$obj_idx = get_class($function[0]).'::'.$function[1];
		return $obj_idx;
	}
}











