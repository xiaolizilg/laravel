<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> hAdmin- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
     <link href="{{ URL::asset('static/admin/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/font-awesome.min.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/style.css?v=4.1.0')}}" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">后台管理系统</strong>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">hAdmin
                        </div>
                    </li>
                    <li class="line dk"></li>

                    <li>
                        <a class="J_menuItem" href="{{url('admin/welcome')}}">
                            <i class="glyphicon glyphicon-home"></i>
                            <span class="nav-label">主页</span>
                        </a>
                    </li>
                  
                    @foreach ($nav as $data)
                        @if($data->pid ==0)
                        <li>
                            <a href="#">
                                <i class="{{$data->icon}}"></i>
                                <span class="nav-label">{{$data->name}}</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                            @foreach ($nav as $child)
                                @if($child->pid == $data->id)
                                <li>
                                    <a class="J_menuItem" href="{{$child->url}}">{{$child->name}}</a>
                                </li>
                                @endif
                            @endforeach
                            </ul>
                        </li>
                        @endif
                   @endforeach

                    <li>
                        <a class="J_menuItem" href="{{url('admin/recycle')}}">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span class="nav-label">回收站</span>
                        </a>
                    </li>

                   

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#">
                            <i class="fa fa-bars"></i> 
                        </a>
                       
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info"  href="{{Route('logout')}}">
                                <i class="glyphicon glyphicon-off"></i>
                                退出
                            </a>
                          
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe id="J_iframe" width="100%" height="100%" src="{{url('admin/welcome')}}" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>

    <!-- 全局js -->
    <script src="{{URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/layer/layer.min.js')}}"></script>

    <!-- 自定义js -->
    <script src="{{URL::asset('static/admin/js/hAdmin.js?v=4.1.0')}}"></script>
    <script type="text/javascript" src="{{URL::asset('static/admin/js/index.js')}}"></script>

    <!-- 第三方插件 -->
    <script src="{{URL::asset('static/admin/js/plugins/pace/pace.min.js')}}"></script>
	
</body>

</html>
