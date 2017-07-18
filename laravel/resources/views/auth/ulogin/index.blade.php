<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title> - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{ URL::asset('static/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/login.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    
    <!-- 验证 -->
    <link rel="stylesheet" href="{{ URL::asset('static/admin/dist/css/bootstrapValidator.css')}}"/>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="{{url('auth/ulogin/login')}}" id="myform">
                   {{ csrf_field() }}
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">请输入你的账号和密码</p>
                    <div class="form-group">
                         <input type="text" class="form-control" placeholder="用户名" name="user_name" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control " placeholder="密码" name="password" />
                    </div>
                    <a href="">忘记密码了？</a>
                    <button class="btn btn-success btn-block">登录</button>
                </form>
            </div>
        </div>
      
    </div>

    <script src="{{ URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{ URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>
    <!-- 验证 -->
    <script src="{{URL::asset('static/admin/js/plugins/layer/layer.min.js')}}"></script>
    <script  src="{{ URL::asset('static/admin/dist/js/bootstrapValidator.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
            $('#myform').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    user_name: {
                        validators: {
                            notEmpty: {
                                message: '用户名不能为空'
                            },
                            stringLength: {
                                min: 5,
                                max: 25,
                                message: '用户名必须大于6，小于25个字符'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: '请输入正确的用户名'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            },
                            stringLength: {
                                min:6,
                                max: 20,
                                message: '密码必须大于6，小于20个字符'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9]+$/,
                                message: '请输入正确的密码'
                            }
                       
                        }
                    },
                   
                   
                }
            })
            .on('success.form.bv', function(e) {
                // 默认提交按钮
                e.preventDefault();
                // 获取表单
                var $form = $(e.target);
                // 获取验证实例
                var bv = $form.data('bootstrapValidator');

                // 使用ajax 提交表单
                $.post($form.attr('action'), $form.serialize(), function(rs) {
                    if (rs.error == 1) {
                        layer.msg(rs.msg);
                        return false;
                    }else{
                        layer.msg(rs.msg);
                        setTimeout(function(){
                              window.location.href="{{url('admin/index')}}"; 
                        },1000);

                    }

                }, 'json');
            });
    });

    </script>

</body>

</html>
