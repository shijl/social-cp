<table id="dg"></table>

<script type="text/javascript">
$('#dg').datagrid({
	url:'/plugin/index',
    columns:[[
		{field:'checkbox', checkbox: true,width:20},
		{field:'id', hidden:true,width:20},
        {field:'plugin_name',title:'插件名称',width:100,align:'center'},
        {field:'plugin_file_name',title:'插件文件名',width:100,align:'center'},
        {field:'plugin_tpye',title:'插件类型',width:100,align:'center',formatter:function(value, rowData){
				if(rowData.plugin_tpye==1){
					return '业务插件';
				}else if(rowData.plugin_tpye==2){
					return '算法插件';
				}else{
					return '未知';
				}	
			}
		},
        {field:'plugin_status',title:'插件状态',width:100,align:'center',formatter:function(value, rowData){
				if(rowData.plugin_status==1){
					return '启用';
				}else if(rowData.plugin_status==2){
					return '停用';
				}else{
					return '删除';
				}	
			}
		},
        {field:'created_at',title:'创建时间',width:200,align:'center',formatter:function(value, rowData){
				var date = getLocalTime(rowData.created_at);
				return date;
			}
		},
        {field:'description',title:'描述',align:'center',width:100},        
        {field:'operation',title:'操作',width:100,align:'center',
            formatter:function(value, rowData, index){
                if(rowData.plugin_status==1){
                	var deal = '<a title="停用" onclick="plugin_status('+rowData.id+',2)"  style="cursor:pointer">停用</a>';
                }else if(rowData.plugin_status==2){
                	var deal = '<a title="启用" onclick="plugin_status('+rowData.id+',1)"  style="cursor:pointer">启用</a>';
                }
				return deal;
			}
        }
    ]],
    pagination:true,
    rownumbers:true
});
function getLocalTime(nS) {     
	return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
}
function plugin_status(id,status) {     
	 $.ajax({
         type: "POST",
         url: "/plugin/update",
         data: {id:id, status:status},
         dataType: "json",
         success: function(data){
        	 $("#dg").datagrid("reload"); 
         }
     });
}
</script>
