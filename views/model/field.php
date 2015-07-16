<table id="field-config"></table>
<input type="hidden" value="" id="project_id" />
<input type="hidden" value="<?php echo $view_id?>" id="view_id" />
<a href="javascript:void(0);" class="easyui-linkbutton" id="save-config" data-options="iconCls:'icon-save'">Save</a>
<script type="text/javascript">
$('#field-config').propertygrid({
	url:'/model/field?p='+'<?php echo $project?>'+'&view_id='+'<?php echo $view_id?>',
	columns:[[
	   { field: 'field_name', title: '名称'},
	   { field: 'field_value', title: '字段值'},
	   { field: 'extra_info', title: '额外信息'},
       { field: 'ck', checkbox:true},
	]],
	showGroup: true,
    scrollbarSize: 0,
    singleSelect: false,
    selectOnCheck: true,
    checkOnSelect: true,

    onLoadSuccess:function(data) {
        if(data){
            $('#project_id').val(data.project_info.id);
        	$.each(data.rows, function(index, item){
        		if(item.checked){
        				$('#field-config').datagrid('checkRow', index);
        			}
        		});
        }
    }
});
$('#save-config').click(function(){
	var checkedItems = $('#field-config').datagrid('getChecked');
	var names = [];
	$.each(checkedItems, function(index, item){
		names.push(item.id);
	});
	console.log(names.join(","));
	var fields = names.join(",");
	var project_id = $('#project_id').val();
	var view_id = $('#view_id').val();
	$.getJSON('/field/save', {fields:fields,project_id:project_id, view_id:view_id}, function(data){
		if(data.code == 1){
			$.messager.alert('提示','保存成功');
		} else {
			$.messager.alert('提示','保存失败');
		}
		$('#field-config').datagrid('reload');
	});

	
});
</script>
