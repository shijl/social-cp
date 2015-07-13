<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class IndexController extends Controller
{
	public $public_key = '-----BEGIN PUBLIC KEY-----  
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC3//sR2tXw0wrC2DySx8vNGlqt  
3Y7ldU9+LBLI6e1KS5lfc5jlTGF7KBTSkCHBM3ouEHWqp1ZJ85iJe59aF5gIB2kl  
Bd6h4wrbbHA2XE1sq21ykja/Gqx7/IRia3zQfxGv/qEkyGOx+XALVoOlZqDwh76o  
2n1vP1D+tD3amHsK7QIDAQAB  
-----END PUBLIC KEY-----';
	
	public function actionIndex()
	{
		$pu_key = openssl_pkey_get_public($this->public_key);
		$uid = '1111';
		$time = time();
		openssl_public_encrypt(md5("uid=".$uid."&time=".$time),$sign,$pu_key);//公钥加密
		$sign = base64_encode($sign);
		
		$http_query = [
			'uid' => $uid,
			'time' => $time,
			'sign' => $sign,
		];
		$url = 'http://yii-demo.com/abc10?'.http_build_query($http_query);
		echo '
				<html>
				<body style="margin:0 0;">
				<div style="width:100%; height:100%; overflow:hidden;">
				<iframe width="100%" scrolling="auto" height="100%" frameborder="0" name="mainFrame" src="'.$url.'"> </iframe>
				</div>
				</body>
				</html>
			';
	}
}