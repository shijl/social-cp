
    <h2>添加项目</h2>
    
    <div class="easyui-panel" title="Ajax Form" style="width:300px;padding:10px;">
        <form id="ff" action="/project" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>项目名称:</td>
                    <td><input name="project_name" class="f1 easyui-textbox"></input></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="submit"></input></td>
                </tr>
            </table>
        </form>
    </div>
    <style scoped>
        .f1{
            width:200px;
        }
    </style>
    <script type="text/javascript">
        $(function(){
            $('#ff').form({
                success:function(data){
                    $.messager.alert('Info', data, 'info');
                }
            });
        });
    </script>
