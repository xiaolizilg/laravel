<!DOCTYPE html>
<html>

<head>

   @include('admin/public/head')

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <h5>角色列表</h5>
                       
                    </div>
                    <div class="ibox-content">
                        <div class="text-left" style="width:200px;float:left">
                            <a href="{{url('admin/role/create')}}" class="btn btn-primary ">添加</a>
                          
                        </div>
                        <div class="">
                          
                            <form class="form-horizontal text-right" method="get" action="{{url('admin/role/index')}}" >
                                <div class="input-group col-sm-4">
                                   
                                    <input type="text" class="form-control" name="keywords" value="{{$keywords}}"> 
                                    <span class="input-group-btn"> 
                                        <button  class="btn btn-primary">搜索 </button> 
                                    </span>
                                </div>
                            </form>
                        </div> 
                         

                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>序号</th>
                                    <th>角色名</th>
                                    <th>时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($list) &&!empty($list))
                                @foreach($list as $data)
                                <tr class="gradeX">
                                    <td> {{$data->id}} </td>
                                    <td> {!!$data->sort!!} </td>
                                    <td> {!!$data->name!!} </td>
                                    <td> {{$data->created_at}} </td>
                                    <td> {!!$data->statusBtn!!} </td>
                                    <td> {!!$data->operateBtn!!} </td> 
                                </tr>
                                @endforeach
                            @else 
                                 <tr class="text-center"><td colspan="6">暂无相关数据！</td></tr>
                            @endif  
                            </tbody>
                        </table>
                        <!-- 分页 -->
                        <div class="text-right">
                        @if (isset($list))
                            {{$list->links()}}
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form method="post" action="{{url('admin/admin/store')}}">
              {{csrf_field()}}
              <input type="hidden" value="" id="pid" name="pid">
              <input type="hidden" name="id" id="id" value="">
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
    @include('admin/public/footer')
    <!-- 自定义js -->
    <script src="{{URL::asset('static/admin/js/content.js?v=1.0.')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/layer/layer.min.js')}}"></script>
    <!-- Page-Level Scripts -->
    <script>
         //删除
    function del(id){
        layer.confirm('您确定要删除？', {
          btn: ['确定','取消'] //按钮
        },function(){ 
          $.get("{{url('admin/role/del')}}",{id:id},function(rs){
                layer.msg('删除成功', {icon: 1});
                setTimeout(function(){
                    window.location.reload(); 
                },1000);
          });
          
        });
    }

    //修改状态
    function status(id,state){
        $.get("{{url('admin/role/status')}}",{id:id,status:state},function(rs){
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

    //修改排序
    function sorts(id,_this) {
         sort =  _this.value;
         $.get("{{url('admin/role/sort')}}",{id:id,sort:sort},function(rs){
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


    //搜索分页
    $(document).ready(function(){

        $(".pagination>li>a").click(function(){
            //获取地址
            page_url = $(this).attr("href");
            //禁止跳转
            $(this).attr("href",'javascript:void(0);');
            url =  page_url+'&keywords='+"{{$keywords or ''}}";
            window.location.href  = url;
        })
       
    });


    </script>

</body>

</html>
