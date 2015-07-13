<?php
namespace app\module\check\controllers;

use Yii;
use yii\web\Controller;

class IndexController extends Controller
{

	public function actionIndex()
	{
		if(!$this->validateIP()) {
			echo 'IP unvalide';exit;
		}
		// 获取字符串，解密验证
		$query = Yii::$app->request->queryParams;
		
		$pi_key = openssl_pkey_get_private($this->module->params['private_key']);
		//这个函数可用来判断公钥是否是可用的
		//$pu_key = openssl_pkey_get_public($this->module->params['public_key']);
		
		//$data = "asssdddf";
		//$encrypted = "";
		$decrypted = "";
		
		// openssl_public_encrypt($data,$encrypted,$pu_key);//公钥加密
		// = base64_encode($encrypted);
		// echo $encrypted,"\n";
		if(empty($query['uid']) || empty($query['time']) || empty($query['sign']))
		{
			echo 'query faild';exit;
		}
		openssl_private_decrypt(base64_decode($query['sign']),$decrypted,$pi_key);//私钥解密 
		$sign = md5("uid=".$query['uid']."&time=".$query['time']);
		if($decrypted == $sign){
			echo 'success';
		} else {
			echo 'faild';
		}
	}
	
	/**
	 * 验证IP来源是否合法
	 */
	public function validateIP()
	{
		return true;
	}
	
	/**
	 * @Purpose: 获取客户端访问ip地址
	 * @Return: 返回ip地址
	 */
	public function get_client_ip()
	{
		$cip = 'unknown';
		if(isset($_SERVER['REAL_IP']) && $_SERVER['REAL_IP'] && strcasecmp($_SERVER['REAL_IP'], 'unknown'))
		{
			$cip = $_SERVER['REAL_IP'];
		}
		elseif(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
		{
			$cip = getenv('HTTP_CLIENT_IP');
		}
		elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
		{
			$cip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
		{
			$cip = getenv('REMOTE_ADDR');
		}
		elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
		{
			$cip = $_SERVER['REMOTE_ADDR'];
		}
	
		if($cip != 'unknown')
		{
			$cip = explode(',', $cip);
			$cip = array_shift($cip);
		}
		return $cip;
	}
}