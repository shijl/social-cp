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
			$(function(){
				$('#tt').tabs({
					onLoad:function(panel){
						var plugin = panel.panel('options').title;
						panel.find('textarea[name="code-'+plugin+'"]').each(function(){
							var data = $(this).val();
							data = data.replace(/(\r\n|\r|\n)/g, '\n');
							if (data.indexOf('\t') == 0){
								data = data.replace(/^\t/, '');
								data = data.replace(/\n\t/g, '\n');
							}
							data = data.replace(/\t/g, '    ');
							var pre = $('<pre name="code" class="prettyprint linenums"></pre>').insertAfter(this);
							pre.text(data);
							$(this).remove();
						});
						prettyPrint();
					}
				});
			});
			function open1(plugin,url){
				if ($('#tt').tabs('exists',plugin)){
					$('#tt').tabs('select', plugin);
				} else {
					$('#tt').tabs('add',{
						title:plugin,
						href:url,
						closable:true,
						extractor:function(data){
							data = $.fn.panel.defaults.extractor(data);
							var tmp = $('<div></div>').html(data);
							data = tmp.find('#content').html();
							tmp.remove();
							return data;
						}
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
							<li iconCls="icon-gears"><a class="e-link" href="#" onclick="open1('登陆模块','1')">登陆模块</a></li>
							<li iconCls="icon-gears"><a class="e-link" href="#" onclick="open1('订单模块','1')">订单模块</a></li>
						</ul>
				</li>
				
				<li iconCls="icon-base">
					<span>插件管理</span>
						<ul>
							<li iconCls="icon-gears"><a class="e-link" href="#" onclick="open1('算法插件','1')">算法插件</a></li>
							<li iconCls="icon-gears"><a class="e-link" href="#" onclick="open1('业务插件','1')">业务插件</a></li>
						</ul>
				</li>
			</ul>
		</div>
		<div region="center">
			<div id="tt" class="easyui-tabs" fit="true" border="false" plain="true">
				<div title="welcome" href=""></div>
			</div>
		</div>
	</body>
</html>


