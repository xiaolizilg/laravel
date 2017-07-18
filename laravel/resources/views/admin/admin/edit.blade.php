@extends('admin.public.base')

@section('title', '添加用户')

@section('content')
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户列表 <small>添加用户</small></h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{url('admin/admin/update')}}"  id="myform">
                             {{csrf_field()}}
                            <input type="hidden"   name="user_id"  value="{{$info->user_id}}">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="user_name" placeholder="用户名" value="{{$info->user_name}}">
                                </div>
                            </div>
                            <!-- <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">初始密码</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="password" placeholder="密码" value="{{$info->password}}" > 
                                </div>
                            </div> -->

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >手机</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="手机"  name="phone" class="form-control" value="{{$info->phone}}">
                                </div>
                            </div>
                           
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分配角色</label>
                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="role_id">
                                        <option value="0">请选择</option>
                                       @foreach($roles as $role)
                                        <option value="{{$role->id}}" 
                                        @if($info->role_id == $role['id']) selected @endif >{{$role->name}}</option>
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
                                            <input type="checkbox" {{$info->status==1?'checked':''}} class="onoffswitch-checkbox" id="example2" name="status">
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
                                    <button class="btn btn-primary" type="submit" >保存</button>
                                    <button class="btn btn-white" >取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myjs')

    <!-- iCheck -->
    <script src="{{ URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
    $(document).ready(function () {
            //多选按钮选中
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            //验证
            $('#myform').bootstrapValidator({
                message: '这个值无效',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    user_name: {
                        message: '请输入用户名',
                        validators: {
                            notEmpty: {
                                message: '用户名不能为空！'
                            },
                            stringLength: {
                                min: 1,
                                max: 20,
                                message: '用户名的长度在1-20个字符！'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: '用户名只能由字母、数字、点和下划线组成！'
                            }
                        }
                    },
                   
                    sort: {
                        validators: {
                            notEmpty: {
                                message: '排序不能为空！'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: '排序只能是数字！'
                            }
                        }
                    },
                   
                    password: {
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            },
                         
                        }
                    },
                    phone:{
                        validators:{
                            notEmpty:{
                                message:'手机不能为空'
                            },
                            stringlength:{
                                min:11,
                                max:11,
                                message:'请输入11位手机号码'
                           },
                           regexp:{
                               regexp:/^1[3|5|8|7]{1}[0-9]{9}$/,
                               message:'请输入正确的手机号码'
                          }
                        }
                    },
                   
                },

                }).on('success.form.bv', function(e) {
                e.preventDefault();

                var $form = $(e.target);

                var bv = $form.data('bootstrapValidator');

                //ajax 提交表单
                $.post($form.attr('action'), $form.serialize(), function(rs) {
                   if(rs.error == 0){
                        layer.msg(rs.msg, {icon: 1});
                        setTimeout(function(){
                            window.location.href =  "{{url('admin/admin/index')}}";
                        },1000);
                        
                    }else{
                        layer.msg(rs, {icon: 2});
                    }
                }, 'json');
            });


    });

    </script>
@endsection
    
    

</body>

</html>
