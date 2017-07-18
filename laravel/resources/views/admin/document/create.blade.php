<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>广告管理</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.ico">
     <link href="{{ URL::asset('static/admin/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('static/admin/css/style.css?v=4.1.0')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('static/admin/layui/css/layui.css')}}">

    <script type="text/javascript" src="{{URL::asset('static/Ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('static/Ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" src="{{URL::asset('static/Ueditor/lang/zh-cn/zh-cn.js')}}"></script>

    <style type="text/css">
        div{
            width:100%;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>广告列表 <small> > 添加广告</small></h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{url('admin/document/store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">文章标题</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="title" placeholder="请输入文章标题">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类</label>

                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="cate_id">
                                        <option value="0">请选择文章分类</option>
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传封面</label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="cover_id" value="0" id="imgs">
                                    <div class="site-demo-upload  ">
                                      <img id="UpImg" src="">
                                      <div class="site-demo-upbar ">
                                        <input type="file" name="file" class="layui-upload-file success " id="test">
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">文章描述</label>
                                <div class="col-sm-4">
                                    <textarea id="ccomment" rows="5" name="desc" class="form-control"  placeholder="请输入文章描述"></textarea>
                                </div>
                            </div>

                             <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >排序</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="排序"  name="sort" class="form-control" value="0">
                                </div>
                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >内容</label>
                                <div class="col-sm-4">
                                    <script id="editor" type="text/plain" style="width:650px;height:300px;" name="content"></script>

                                </div>
                            </div>
                            
                           <!--  <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >关键字</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="请输入关键字"  name="keywords" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >seo标题</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="seo标题"  name="seo_title" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >seo描述</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="seo描述"  name="seo_doscription" class="form-control">
                                </div>
                            </div>
 -->
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"> 
                            <label class="col-sm-2 control-label">状态</label>
                               
                                <div class="col-sm-4">
                                    <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" checked="" class="onoffswitch-checkbox" id="example2" name="status">
                                            <label class="onoffswitch-label" for="example2">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" >保存</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--     <div id="modal-form" class="modal fade" aria-hidden="true">
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
 -->
    <!-- 全局js -->
    <script src="{{ URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{ URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>

    <!-- 自定义js -->
    <script src="{{ URL::asset('static/admin/js/content.js?v=1.0.0')}}"></script>

    <!-- iCheck -->
    <script src="{{ URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{ URL::asset('static/admin/layui/layui.js')}}" charset="utf-8"></script>
    <script>
        layui.use('upload', function(){
            
              layui.upload({
                url: "{{url('admin/uploade/uploadImg')}}",
                elem: '#test', //指定原始元素，默认直接查找class="layui-upload-file"
                method: "post",//上传接口的http类型
                ext: 'jpg|png|gif',
                success: function(rs){
                    //alert(rs.path
                $('#UpImg').css({'width':'200px','height':'200px','margin-bottom':'15px'});
                $('#imgs').val(rs.msg.id);
                UpImg.src = rs.msg.path;
                }
              });
          
        });

        //Ueditor实例化编辑器
        var ue = UE.getEditor('editor');
    </script>

    
    

</body>

</html>
