@extends('admin.public.base')

@section('title', '查看用户')

@section('content')
       
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户列表 <small>用户详情</small></h5>
                        <div class="ibox-tools">
                          
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form  class="form-horizontal">
                        {{csrf_field()}}
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名</label>
                            
                                <div class="col-sm-4">
                                    <p class="form-control-static">{{$info->user_name or '暂无数据'}}</p>
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >手机</label>

                                <div class="col-sm-4">
                                    <p class="form-control-static">{{$info->phone or '暂无数据'}}</p>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱</label>
                            
                                <div class="col-sm-4">
                                    <p class="form-control-static">{{$info->email or '暂无数据'}}</p>
                                </div>
                            </div>

                             
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">状态</label>
                            
                                <div class="col-sm-4">
                                    <p class="form-control-static">{{$info->status ==1?'正常': '禁用'}}</p>
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>
                                <div class="col-sm-10">
                                    <div class="radio i-checks">
                                        <label>
                                            <input type="radio" value="option1" name="a" {{$info->sex == 1?'checked':''}}> <i></i> 男
                                        </label>
                                         <label>
                                            <input type="radio"  value="0" name="a" {{$info->sex == 0?'checked':''}}> <i></i>女
                                        </label>
                                    </div>
                                </div>
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
@endsection

@section('myjs')
    <!-- iCheck -->
    <script src="{{ URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
         $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
    

</body>

</html>
