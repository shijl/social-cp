<table id="dg"></table>

<script type="text/javascript">
$('#dg').datagrid({
	
    columns:[[
        {field:'plugin_name',title:'插件名',width:100},
        {field:'status',title:'状态',width:100},

        
        {field:'operation',title:'操作',width:100,align:'right'}
    ]],
    pagination:true,
    rownumbers:true
});
</script>
