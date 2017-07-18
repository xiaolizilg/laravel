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
    <link href="{{ URL::asset('static/admin/layui/css/layui.css')}}" rel="stylesheet">
    <!-- 多文件上传 -->

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/FileUpload/css/default.css')}}">
    <link href="{{ URL::asset('static/FileUpload/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
   
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
                        <form method="post" class="form-horizontal" action="{{url('admin/advs/store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告标题</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="title" placeholder="请输入广告标题">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类</label>

                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="position">
                                        <option value="0">请选择</option>
                                       @foreach($position as $val)
                                        <option value="{{$val->id}}">{{$val->title}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传图片</label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="img" value="" id="imgs">
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
                                <label class="col-sm-2 control-label">上传图片</label>
                                <div class="col-sm-10">
                                    <!-- <input type="hidden" name="img" value="" id="imgs">
                                    <div class="site-demo-upload  ">
                                      <img id="UpImg" src="">
                                      <div class="site-demo-upbar ">
                                        <input type="file" name="file" class="layui-upload-file success " id="test">
                                      </div>
                                    </div> -->
                                    <div class="form-group">
                                       <label>Preview File Icon</label>
                                       <input id="file-3" type="file" multiple=true name="file">
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告描述</label>
                                <div class="col-sm-4">
                                    <textarea id="ccomment" rows="5" name="desc" class="form-control"  placeholder="请输入广告描述"></textarea>
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >链接地址</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="请输入链接地址"  name="url" class="form-control">
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

    <!-- 全局js -->
    <script src="{{ URL::asset('static/admin/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{ URL::asset('static/admin/js/bootstrap.min.js?v=3.3.6')}}"></script>

    <!-- 自定义js -->
    <script src="{{ URL::asset('static/admin/js/content.js?v=1.0.0')}}"></script>

    <!-- iCheck -->
    <script src="{{ URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{ URL::asset('static/admin/layui/layui.js')}}" charset="utf-8"></script>
    <!-- 文件上传 -->
    <script src="{{ URL::asset('static/FileUpload/js/fileinput.js')}}" type="text/javascript"></script>
    <!--简体中文-->
    <script src="{{ URL::asset('static/FileUpload/js/locales/zh.js')}}" type="text/javascript"></script>

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

        //多文件上传
        $("#file-3").fileinput({
            uploadUrl: "{{url('admin/uploade/uploadImg')}}", 
            showUpload: true, //是否显示上传按钮
            showCaption: true,//是否显示标题
            language: 'zh', //设置语言
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            maxFileSize: 10000,
            maxFilesNum: 4,
            maxFileCount: 4,//表示允许同时上传的最大文件个数
            browseClass: "btn btn-primary", //按钮样式   
         });
        //  成功回调
        $("#file-3").on("fileuploaded", function (event, data, previewId, index) {
        
            console.log(data.response);
            if (data.response) {
                id =  data.response.id;
                input = '<input type="hidden" name="img[]" value="'+id+'"/>';
                $('#rile-3').append(input);

            }
       
        });


    </script>

    
    

</body>

</html>
