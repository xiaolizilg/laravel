<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 数据表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{ URL::asset('static/admin/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">

    <!-- Data Tables -->
    <link href="{{ URL::asset('static/admin/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/style.css?v=4.1.0')}}" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>文章分类列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <a href="{{url('admin/category/create')}}" class="btn btn-primary " >添加</a>
                        </div>
                        
                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>排序</th>
                                    <th>标题</th>
                                    <th>显示状态</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($list))
                                @foreach($list as $data)
                                <tr class="gradeX">
                                    <td> {{$data->id}}   </td>
                                    <td> 
                                        <input type="text" name="sort" style="width:35px;text-align: center;" value="{{$data->sort}}" class="sort" 
                                    onblur='sorts({{$data->id}},this)' />
                                    </td>
                                    <td>
                                        <input type="text" name="title" id="t_title" value="{!!$data->title!!}" class="form-control" style="width:200px">
                                    </td>
                                    <td>
                                        {!!$data->statusBtn!!}
                                    </td>
                                    <td>
                                        {{$data->created_at}}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('admin/category/info')}}"> 查看 </a>
                                        <a class="btn btn-success" href="{{url('admin/category/edit',['id'=>$data->id])}}"> 编辑 </a>
                                        <a class="btn btn-danger" href="javascript:del({{$data->id}})"> 删除 </a>
                                    </td>
                                </tr>
                                @endforeach

                                @else 
                                 <tr class="text-center"><td colspan="5">暂无相关数据！</td></tr>
                             @endif   
                            </tbody>
                            
                        </table>
                        <div class="text-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form method="post" action="{{url('admin/admin/store')}}">
              <input type="hidden" value="" id="pid" name="pid">
              <input type="hidden" name="id" id="id" value="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">权限名称</h4>
                    </div>
                    <div class="modal-body">
                        <label  class="col-sm-2 control-label">标识</label>
                        <div class="input-group colorpicker-component demo demo-auto">
                            <input type="text" value="" class="form-control" name="name" id="name" />
                            <span class="input-group-addon"><i></i></span>
                        </div>

                    </div>

                    <div class="modal-body">
                         <label  class="col-sm-2 control-label">标题</label>
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
    <script src="{{URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/jeditable/jquery.jeditable.js')}}"></script>
    <!-- Data Tables -->
    <script src="{{URL::asset('static/admin/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>

    <!-- 自定义js -->
    <script src="{{URL::asset('static/admin/js/content.js?v=1.0.')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/layer/layer.min.js')}}"></script>
      <script src="{URL::asset('static/admin/js/plugins/iCheck/icheck.min.js")}}></script>

    <!-- Page-Level Scripts -->
    <script>
         //删除
    function del(id){
        layer.confirm('您确定要删除？', {
          btn: ['确定','取消'] //按钮
        },function(){ 
          $.get("{{url('admin/category/del')}}",{id:id},function(rs){
                layer.msg('删除成功', {icon: 1});
                setTimeout(function(){
                    window.location.reload(); 
                },1000);
          });
          
        });
    }

    //修改状态
    function status(id,state){
       
        $.get("{{url('admin/category/status')}}",{id:id,status:state},function(rs){
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

    //排序
    function sorts(id,_this) {
       sort =  _this.value;
       // alert(sort);
         $.get("{{url('admin/category/sort')}}",{id:id,sort,sort},function(rs){
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
