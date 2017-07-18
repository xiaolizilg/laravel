<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>菜单管理</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
     <link href="{{ URL::asset('static/admin/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/style.css?v=4.1.0')}}" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>菜单列表<small>&ebsp添加菜单</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                           <!--  <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul> -->
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{url('admin/menu/addEdit')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">菜单名称</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" placeholder="请输入菜单名称">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">请输入跳转地址</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="url" placeholder="请输入跳转地址"> 
                                    <span class="help-block m-b-none">例如（admin/user/index）</span>
                                </div>
                            </div>
            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >icon</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="图标icon"  name="icon" class="form-control" placeholder="请输入图标icon">
                                </div>
                            </div>
                           
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类</label>

                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="pid">
                                        <option value="0">请选择</option>
                                        @foreach ($menu as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                              
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" >保存</button>
                                    <button class="btn btn-white" type="reset">取消</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">登录</h3>
                            <form role="form">
                                <div class="form-group">
                                    <label>用户名：</label>
                                    <input type="email" placeholder="请输入用户名" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>密码：</label>
                                    <input type="password" placeholder="请输入密码" class="form-control">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>登录</strong>
                                    </button>
                                    <label>
                                        <input type="checkbox" class="i-checks">自动登录</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h4>还不是会员？</h4>
                            <p>您可以注册一个账户</p>
                            <p class="text-center">
                                <a href="form_basic.html"><i class="fa fa-sign-in big-icon"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="{{ URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{ URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>

    <!-- 自定义js -->
    <script src="{{ URL::asset('static/admin/js/content.js?v=1.0.0')}}"></script>

    <!-- iCheck -->
    <script src="{{ URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
       
    </script>

    
    

</body>

</html>
