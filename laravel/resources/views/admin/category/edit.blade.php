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
                        <h5>分裂列表 <small> > 添加分类</small></h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{url('admin/category/store')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$info->id}}">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类标题</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="title" placeholder="请输入分类标题" value="{{$info->title}}">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类标识</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" placeholder="请输入分类标识" value="{{$info->name}}">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">选择分类</label>

                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="pid">
                                        <option value="0">顶级分类</option>
                                        @foreach($cate as $v)
                                             <option value="{{$v->id}}" @if($info->pid == $v->id)  selected @endif>{!!$v->title!!}</option>
                                        @endforeach
                                    </select>
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
    <script>
    </script>

</body>

</html>
