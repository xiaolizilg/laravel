<!DOCTYPE html>
<html>

<head>
     @include('admin.public.head')
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div id="msg">
           <!--  @if($errors->first())
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                   操作失败
                </div>
            @else    
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                   操作成功{{$msg or ''}}
                </div>
            @endif -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <h5>管理员列表</h5>
                       
                    </div>
                    <div class="ibox-content">
                        <div class="text-left" style="width:200px;float:left">
                            <a href="{{url('admin/admin/create')}}" class="btn btn-primary ">添加</a>

                        </div>
                        <div class="">
                          
                            <form class="form-horizontal text-right" method="get" action="{{url('admin/admin/index')}}" >
                                <div class="input-group col-sm-4">
                                   
                                    <input type="text" class="form-control" name="keywords" value="{{$keywords or ''}}"> 
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
                                    <th>用户名</th>
                                    <th>电话</th>
                                    <th>显示状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($list))
                                @foreach($list as $data)
                                <tr class="gradeX">
                                    <td> {{$data->user_id}}     </td>
                                    <td> {!!$data->sort!!} </td>
                                    <td> {!!$data->user_name!!} </td>
                                    <td> {{$data->phone or ''}} </td>
                                    <td> {!!$data->statusBtn!!} </td>
                                    <td>
                                       {!!$data->operateBtn!!}
                                    </td>
                                </tr>
                                @endforeach
                            @else 
                                 <tr class="text-center">
                                     <td colspan="6">暂无相关数据！</td>
                                 </tr>
                            @endif  
                                
                            </tbody>
                           
                        </table>
                        <div class="text-right">
                            @if (isset($list))
                                {{ $list->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('admin.public.footer')
   
    <!-- 自定义js -->
    <script>


    //删除
    function del(id){
        layer.confirm('您确定要删除？', {
          btn: ['确定','取消'] //按钮
        },function(){ 
          $.get("{{url('admin/admin/del')}}",{id:id},function(rs){
                layer.msg('删除成功', {icon: 1});
                setTimeout(function(){
                    window.location.reload(); 
                },1000);
          });
          
        });
    }

    //修改状态
    function status(id,state){
        $.get("{{url('admin/admin/status')}}",{user_id:id,status:state},function(rs){
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
         $.get("{{url('admin/admin/sort')}}",{user_id:id,sort:sort},function(rs){
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
            url =  page_url+'&keywords='+"{{$keywords}}";
            window.location.href  = url;
        })
       
    });

       
    </script>

</body>

</html>
