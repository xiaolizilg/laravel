 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 基础表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="{{URL::asset('static/admin/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{URL::asset('static/admin/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{URL::asset('static/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('static/admin/css/style.css?v=4.1.0')}}" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>服务器信息</h5>
                      
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            
                                <tr>
                                    <td>操作系统：</td> <td>{{$os or ''}}</td> 
                                </tr>

                            <tbody>
                                <tr>
                                    <td>php版本：</td><td>{{$phpv or ''}}</td>
                                </tr>
                                <tr>
                                    <td>ip:</td> <td>{{$ip or ''}}</td>
                                </tr>
                                <tr>
                                    <td>服务器环境：</td> <td> {{$web_server or ''}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>扩展</h5>
                        <div class="ibox-tools">
                          
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                                <tr>
                                    <td>GD 版本</td> 
                                    <td>{{$gdinfo}}</td> 
                                </tr>
                            <tbody>
                                <tr>
                                    <td>安全模式：</td>
                                    <td>{{$safe_mode}}</td>
                                </tr>
                                <tr>
                                    <td>Zlib支持：</td>
                                    <td>{{$zlib}}</td> 
                                </tr>
                                <tr>
                                    <td>Curl支持：</td> 
                                    <td>{{$curl}}</td> 
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>技术支持</h5>
                        <div class="ibox-tools">
                           
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-bordered">
                                <tr>
                                    <td>技术支持：</td>
                                    <td>成都紫平方</td>
                                </tr>
                            <tbody>
                                <tr>
                                    <td>技术部门：</td>
                                    <td>项目六部</td>
                                   
                                </tr>
                                <tr>
                                    <td>开发:</td>
                                    <td>高波</td>
                                </tr>
                                <tr>
                                    <td>项目名称:</td>
                                    <td>系统管理</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>操作</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover">
                                <tr>
                                    <td>管理员：</td>
                                    <td>admin</td>
                                </tr>
                            <tbody>
                                <tr>
                                    
                                    <td>最大占用内存：</td>
                                    <td>{{$memory_limit}}</td> 
                                </tr>
                                <tr>
                                    <td>文件上传限制:</td>
                                    <td>{{$fileupload}}</td>
                                </tr>
                                <tr>
                                    <td>域名:</td>
                                    <td>{{$domain}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      
    </div>

    <!-- 全局js -->
    <script src="{{URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>

    <!-- Peity -->
    <script src="{{URL::asset('static/admin/js/plugins/peity/jquery.peity.min.js')}}"></script>

    <!-- 自定义js -->
    <script src="{{URL::asset('static/admin/js/content.js?v=1.0.0')}}"></script>

    <!-- iCheck -->
    <script src="{{URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>

    <!-- Peity -->
    <script src="{{URL::asset('static/admin/js/demo/peity-demo.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    
    

</body>

</html>
