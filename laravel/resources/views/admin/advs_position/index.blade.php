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
                        <h5>可编辑表格</h5>
                        
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <a href="{{url('admin/advsposition/create')}}" class="btn btn-primary ">添加</a>
                        </div>
                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>排序</th>
                                    <th>标题</th>
                                    <th>标识</th>
                                    <th>状态</th>
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
                                    <td> {{$data->title}} </td>
                                    <td> {{$data->name or ''}}     </td>
                                    <td class="center">{!!$data->statusBtn!!}</td>
                                    <td> {{$data->created_at}}</td>
                                    <td class="center">
                                        <a class="btn btn-primary" href="{{url('admin/user/info')}}"> 查看 </a>
                                        <a class="btn btn-success" href="{{url('admin/advsposition/edit',['id'=>$data->id])}}"> 编辑 </a>
                                        <a class="btn btn-danger" onclick='del("{{$data->id}}")'> 删除 </a>
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
    <!-- Page-Level Scripts -->
    <script>
    //删除
    function del(id){
        layer.confirm('您确定要删除？', {
          btn: ['确定','取消'] //按钮
        },function(){ 
          $.get("{{url('admin/advsposition/del')}}",{id:id},function(rs){
                layer.msg('删除成功', {icon: 1});
                setTimeout(function(){
                    window.location.reload(); 
                },1000);
          });
          
        });
    }

    //修改状态
    function status(id,state){
       
        $.get("{{url('admin/advsposition/status')}}",{id:id,status:state},function(rs){
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
/*$(function(){
    $('.sort').


})*/
    function sorts(id,_this) {
       sort =  _this.value;
       // alert(sort);
         $.get("{{url('admin/advsposition/sort')}}",{id:id,sort:sort},function(rs){
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
