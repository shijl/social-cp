<h2>项目搜索</h2>
    <p>Click search button or press enter key in input box to do searching.</p>
    <div style="margin:20px 0;"></div>
    <input class="easyui-searchbox" data-options="prompt:'Please Input Value',searcher:doSearch" style="width:300px"></input>
    <script>
    	view_id = "<?php echo $view_id?>";
        function doSearch(value){
        	open1(value,'/model/search?p='+value+'&view_id='+view_id);
        }
    </script>