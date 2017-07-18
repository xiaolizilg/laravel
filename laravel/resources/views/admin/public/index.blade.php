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
        @yield('content')
      
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

