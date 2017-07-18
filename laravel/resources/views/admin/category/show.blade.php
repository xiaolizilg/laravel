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
                                    <input type="text" class="form-control" name="title" placeholder="请输入广告标题" value="{{$info->title or ''}}">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类</label>

                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="position">
                                        <option value="0">请选择</option>
                                       @foreach($position as $val)
                                        <option value="{{$val->id}}"  @if(isset($info->position) && $info['position'] == $val['id'])
                                         selected
                                        @endif>{{$val->title}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传图片</label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="img" value="{{$info->img}}" id="imgs">
                                    <div class="site-demo-upload  ">
                                      <img id="UpImg" src="{{$info->path}}" @if(isset($info->path)) 
                                        style="width:200px;heightL200px;margin-bottom:15px"@endif>
                                      <div class="site-demo-upbar ">
                                        <input type="file" name="file" class="layui-upload-file success " id="test">
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告描述</label>
                                <div class="col-sm-4">
                                    <textarea id="ccomment" rows="5" name="desc" class="form-control"  placeholder="请输入广告描述">{{$info->desc}}</textarea>
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >链接地址</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="请输入链接地址"  name="url" class="form-control" value="{{$info->url or ''}}">
                                </div>
                            </div>
                           
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >排序</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="排序"  name="sort" class="form-control" value="{{$info->sort or '0'}}">
                                </div>
                            </div>
                             <div class="hr-line-dashed"></div>
                            <div class="form-group"> 
                            <label class="col-sm-2 control-label">状态</label>
                               
                                <div class="col-sm-4">
                                    <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" checked="" class="onoffswitch-checkbox" id="example2" name="status" value="{{$info->status}}">
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
    </script>

    
    

</body>

</html>
