<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>  @yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{ URL::asset('static/admin/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/style.css?v=4.1.0')}}" rel="stylesheet">
    <!-- 验证 -->
    <link rel="stylesheet" href="{{ URL::asset('static/admin/dist/css/bootstrapValidator.css')}}"/>
    <!--  -->
    <link href="{{ URL::asset('static/admin/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
      <div>
           @yield('content')
      </div>
    </div>

    <!-- 全局js -->
    <script src="{{ URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{ URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/layer/layer.min.js')}}"></script>
    <!-- 验证 -->
    <script type="text/javascript" src="{{ URL::asset('static/admin/dist/js/bootstrapValidator.js')}}"></script>
    <!-- 自定义js -->
     @yield('myjs')

   
    
</body>

</html>
