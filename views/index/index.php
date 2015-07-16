<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>CP</title>
		<link rel="stylesheet" type="text/css" href="/static/jquery-easyui-1.4.3/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="/static/jquery-easyui-1.4.3/demo.css">
		<script type="text/javascript" src="/static/jquery-easyui-1.4.3/jquery.min.js"></script>
		<script type="text/javascript" src="/static/jquery-easyui-1.4.3/jquery.easyui.min.js"></script>
		<script type="text/javascript">
			function open1(plugin,url){
				if ($('#tt').tabs('exists',plugin)){
					$('#tt').tabs('select', plugin);
				} else {
					$('#tt').tabs('add',{
						title:plugin,
						href:url,
						closable:true,
					});
				}
			}
		</script>
	</head>
	<body class="easyui-layout" style="text-align:left">
		<div region="north" border="false" style="background:rgba(0, 0, 0, 0) linear-gradient(to bottom, #eff5ff 0px, #e0ecff 100%) repeat-x scroll 0 0;text-align:center">
						<div id="header-inner">
				<table cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td rowspan="2" style="width:20px;">
						</td>
						<td style="height:52px;">
							<div style="color:#fff;font-size:22px;font-weight:bold;">
								<a href="" style="color:#0e2d5f;font-size:22px;font-weight:bold;text-decoration:none">Config Platform</a>
							</div>
							
						</td>
						
					</tr>
				</table>
			</div>
			
		</div>
		<div region="west" split="true" title="Menu" style="width:250px;padding:5px;">
			<ul class="easyui-tree">
				<li iconCls="icon-base">
					<span>项目模块参数配置</span>
						<ul>
						
						<?php 
							if(!empty($model)) {
								foreach($model as $mk=>$mv) {
									echo '<li iconCls="icon-gears">';
									echo '<span>'.$mv['model_name'].'</span>';
									if(!empty($mv['view'])) {
										echo '<ul>';
										foreach ($mv['view'] as $vk=>$vv) {
											echo '<li><a class="e-link" href="javascript:void(0);" onclick="open1(\''.$vv['view_name'].'\',\'/model?view_id='.$vv['id'].'\')">'.$vv['view_name'].'</a></li>';
										}
										echo '</ul>';
									}
									echo '</li>';
								}
							}
						?>
							
						</ul>
				</li>
				<li iconCls="icon-base">
					<span>项目管理</span>
						<ul>
							<li iconCls="icon-gears"><a class="e-link" href="#" onclick="open1('添加项目','/project')">添加项目</a></li>
						</ul>
				</li>
				<li iconCls="icon-base">
					<span>插件</span>
					
						<ul>
							<li iconCls="icon-gears"><a class="e-link" href="#" onclick="open1('算法插件','/plugin/index')">插件管理</a></li>
							<li iconCls="icon-gears"><a class="e-link" href="#" onclick="open1('业务插件','/plugin/plugin-log')">插件日志</a></li>
						</ul>
				</li>
				
				
			</ul>
		</div>
		<div region="center">
			<div id="tt" class="easyui-tabs" fit="true" border="false" plain="true" >
				<div title="welcome" href=""></div>
			</div>
		</div>
	</body>
</html>


