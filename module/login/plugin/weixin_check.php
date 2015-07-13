<?php
namespace app\module\login\plugin;


class weixin_check extends plugin_base{
	
	function check($id) 
	{
		if($id == 1) {
			echo '微信验证成功';
		}
	}
	
	function render()
	{
		echo Html::label('微信验证号：');
		echo Html::textInput('weixin_id', null, ['class' => 'form-control']);
	}
}


