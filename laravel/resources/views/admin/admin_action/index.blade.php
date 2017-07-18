<!DOCTYPE html>
<html>

<head>
  @include('admin.public.head')
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <h5>可编辑表格</h5>
                       
                    </div>
                    <div class="ibox-content">
                        <div class="text-left" style="width:200px;float:left">
                             <button class="btn btn-primary " data-toggle="modal" data-target="#myModal" onclick="insert(1,0)" data-toggle="modal">添加</button>
                        </div>

                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>序号</th>
                                    <th>权限名</th>
                                    <th>地址</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($list) &&!empty($list))
                                @foreach($list as $data)
                                <tr class="gradeX">
                                    <td> {{$data->id}}        </td>
                                     <td> {!!$data->sort!!}        </td>
                                    <td> {!!$data->name!!}    </td>
                                    <td> {{$data->url or ''}} </td> 
                                    <td> {!!$data->statusBtn!!}</td>
                                    <td> {!!$data->operateBtn!!}     </td> 
                                </tr>
                                @endforeach
                            @else 
                                 <tr class="text-center"><td colspan="6">暂无相关数据！</td></tr>
                            @endif  
                                
                            </tbody>
                           
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form method="post" action="{{url('admin/admin/store')}}">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">权限名称</h4>
                    </div>
                    <div class="modal-body">
                        <label  class="col-sm-2 control-label">名称</label>
                        <div class="input-group colorpicker-component demo demo-auto">
                            <input type="text" value="" class="form-control" name="name" id="name" />
                            <span class="input-group-addon"><i></i></span>
                        </div>

                    </div>

                    <div class="modal-body">
                         <label  class="col-sm-2 control-label">路由地址</label>
                        <div class="input-group colorpicker-component demo demo-auto">
                            <input type="text" value="" class="form-control" name="url" id="url" />
                           <span class="input-group-addon"><i></i></span>
                        </div>
                    </div>


                    <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="create()">确定</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- 全局js -->
    @include('admin.public.footer')

    <!-- 自定义js -->
    <script>
    //禁用启用
     function status(id,status){

        $.get("{{url('admin/adminAction/status')}}", {id: id, status:status},function(rs){
            if(rs.error==0){
                layer.msg(rs.msg,{icon:1});
                setTimeout(function(){
                  window.location.reload(); 
                },1000);
            }
        });

    };

    var id,pid;
    //新增 编辑
    function insert(status,p_id,t_id=""){

       switch(status)
       {
         
        case 1:   //添加
          $('#name').val('');
          $('#url').val('');
          pid = p_id;
          id  = '';
        break;
        
        case 2:   // 编辑
           id  = t_id;
           pid = p_id;
           $.get("{{url('admin/adminAction/edit')}}",{id:t_id},function(rs){

              $('#name').val(rs.name);
              $('#url').val(rs.url);

           });

        break;
       }
       
    }

    //提交数据
    function create(){
        var name = $('#name').val();
        var url  = $('#url').val();

        $.post("{{url('admin/adminAction/store')}}",{
          pid:pid,
          name:name,
          id:id,
          url:url,
          _token:"{{ csrf_token()}}"
        },function(rs){
            if (rs.error==0) {
                layer.msg(rs.msg,{icon:1});
                setTimeout(function(){
                   window.location.reload(); 
                },1000);
            }
        });
       
    }

    function del(id){

      layer.confirm('你确定要删除？', {
            btn: ['确定','取消'] //按钮
          }, 
          function() {
              $.get("{{url('admin/adminAction/del')}}",{id:id},function(rs){

                  if (rs.error == 0) {
                    layer.msg(rs.msg,{icon:1});
                    setTimeout(function(){
                       window.location.reload(); 
                    },1000);
                   }  

              });
          }


      );      

    }



      //修改排序
    function sorts(id,_this) {
         sort =  _this.value;
         $.get("{{url('admin/adminAction/sort')}}",{id:id,sort:sort},function(rs){
            if(rs.error == 0){
                layer.msg('操作成功', {icon: 1});
                setTimeout(function(){
                    window.location.reload(); 
                },1000);
            }else{
                layer.msg('操作失败', {icon: 2});
            }
        });
    }






  </script>

</body>

</html>
