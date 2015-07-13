<?php
namespace app\module\login\plugin\weixin;


class weixin_check extends \app\module\login\plugin\plugin_base{
	
	
	function init()
	{
		$weixin_id = isset($_POST['weixin_id']) ? $_POST['weixin_id'] : '';
		if($weixin_id == 1) {
			echo '微信验证成功';
		} else {
			echo '微信验证失败';
		}
	}
	
	function render()
	{
		echo '<label>微信验证号：</label><input class="form-control" type="text" name="weixin_id">';
	}
}
