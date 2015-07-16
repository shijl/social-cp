<div class="search" style="height:50px;line-height:50px;">
  	   <label>插件名称:</label><input type="text" value="" id="plugin_name" />
  	   <label>项目名称:</label><input type="text" value="" id="project_name" />
  	   <label>下载状态:</label>
       <select  id="download_status">
          <option value="" selected="selected">全部</option>
          <option value="1">成功</option>
          <option value="2">失败</option>
       </select> 
	   <input type="button" value="搜 索" name="" class="buttons" onclick="search();" />
</div>
<table id="plugin_log"></table>

<script type="text/javascript">
$('#plugin_log	').datagrid({
	url:'/plugin/plugin-log',
    columns:[[
		{field:'checkbox', checkbox: true,width:20},
		{field:'id', hidden:true,width:20},
        {field:'plugin_id',title:'插件id',width:100,align:'center'},
        {field:'plugin_name',title:'插件名称',width:100,align:'center'},
        {field:'project_id',title:'项目id',width:100,align:'center'},
        {field:'project_name',title:'项目名称',width:100,align:'center'},
        {field:'download_status',title:'下载状态',width:100,align:'center',formatter:function(value, rowData){
				if(rowData.download_status==1){
					return '成功';
				}else{
					return '失败';
				}
			}
		},
        {field:'time',title:'下载时间',align:'center',width:200,formatter:function(value, rowData){
				var date = getLocalTime(rowData.time);
				return date;
			}
		},
    ]],
    pagination:true,
    rownumbers:false
});
function getLocalTime(nS) {     
	return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
}
function search()
{
	var message = '';
	var plugin_name = $.trim($("#plugin_name").val());
	var project_name = $.trim($("#project_name").val());
	var download_status = $.trim($("#download_status").val());
	if(!plugin_name&&!project_name&&!download_status)
	{
		message = '请输入要查询的插件名称与项目名称';
	}
	if(message)
	{
		$.messager.alert('提示框', message, 'warning');
		return false;
	}
	
	
	var param = {"plugin_name":plugin_name, "project_name":project_name,"download_status":download_status};
	$("#plugin_log").datagrid("load", param);
}	
</script>
