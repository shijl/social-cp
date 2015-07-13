<?php
namespace app\module\login\plugin;


class weibo_check extends plugin_base{
	
	function check($id) 
	{
		if($id == 1) {
			echo '微博验证成功';
		}
	}
}