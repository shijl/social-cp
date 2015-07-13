<?php
namespace app\module\login\plugin;

class login_plugin extends plugin_base
{
	
	public function login($username,$password)
	{
		if($username==1 && $password==123456){
			echo '登陆成功';
		}
	}
}