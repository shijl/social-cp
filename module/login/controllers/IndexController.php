<?php
namespace app\module\login\controllers;

use Yii;
use yii\web\Controller;
use app\module\login\model\Login;
use app\module\login\model\LoginConfig;

class IndexController extends Controller
{
	public function beforeAction($action)
	{
		if (!parent::beforeAction($action)) {
			return false;
		}
		
		echo 'before action';
		return true;
	}
	
	public function afterAction($action, $result)
	{
		$result = parent::afterAction($action, $result);
		
		return $result;
	}
	
	public function actionIndex()
	{	
		if(isset($_POST['subm'])) {
			// 执行验证微信逻辑
			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$password = isset($_POST['password']) ? $_POST['password'] : '';
			
			// $re = $this->do_action('login', $username, $password);
			if($username==1 && $password==123456){
				echo '登陆成功';
			}
			
			$re = $this->do_action('login');
			
		} else {
			$plugin = \app\module\login\model\Plugin::findOne(['plugin'=>['login']]);
			$class = $this->getClass($plugin->function_model);
			return $this->render('index', ['plugin'=>$class]);
		}
	}
	
	public function getClass($dir_name)
	{
		$dir = __DIR__ . '/../plugin/'.$dir_name;
		if($dir_name == '' || !is_dir($dir)) {
			return '';
		}
		$handle = opendir($dir);
		$array_file = array();
		while (false !== ($file = readdir($handle)))
		{
			if ($file != "." && $file != "..") {
				$object = "app\module\login\plugin\\" . $dir_name . "\\" . trim($file, '.php');
				$array_file[] = new $object();
			}
		}
		closedir($handle);
		return $array_file;
	}
	
	public function do_action($tag)
	{
		$plugin = \app\module\login\model\Plugin::findOne(['plugin'=>$tag]);
		
		if(empty($plugin) || empty($plugin->function_model))
			return ;
			
		// $filter[] = unserialize($plugin->function_model);
		$filter = $this->getClass($plugin->function_model);
		
// 		for($a = 1, $num=func_num_args(); $a<$num; $a++)
// 			$param_arr[] = func_get_arg($a);
		
		if(isset($filter)) {
			foreach ($filter as $k=>$v) {
				call_user_func_array(array($v, 'init'), array());
			}
		}
		return true;
	}
}