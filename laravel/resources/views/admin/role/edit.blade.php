@extends('admin.public.base')

@section('title', '添加管理员')

@section('content')
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <h5> 角色列表 / <span >添加角色</span></h5>
                    </div>
                    
                    <div class="ibox-content">
                        <div>
                        </div>
                        <form method="post" action="{{url('admin/role/update')}}" class="form-horizontal" id="myform">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$info->id}}">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">角色名</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" placeholder="角色名" value="{{$info->name or ''}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">权限分配</label>
                                <div class="col-sm-8">
                                    <table class="table table-striped table-bordered table-hover "
                                     id="editable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <input type="checkbox"  onclick="choosebox(this)"  >
                                                </th>
                                                <th>权限名</th>
                                                <th>地址</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($admin as $data)
                                            <tr class="gradeX">
                                                <td class="text-center"> 
                                                    
                                                    <input type="checkbox" name="admin_id[]" class="parent" cka="mod-{{$data->id}}" value="{{$data->id}}" @if(isset($info['admin_id']) && in_array($data['id'],$info['admin_id']) ) checked="" @endif />
                                                </td>
                                                <td class="text-left"> {!!$data->name!!} </td>
                                                <td width="70%" class="text-left"> 
                                                     @foreach($data['child'] as $va)
                                                      
                                                       <input type="checkbox" name="admin_id[]" ck="mod-{{$data->id}}" value="{{$va->id}}" 
                                                        @if(isset($info['admin_id']) && in_array($va['id'],$info['admin_id']) ) checked="" @endif
                                                       >
                                                        {{$va->name or ''}} 
                                                     @endforeach  
                                                </td> 
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" >保存</button>
                                    <button class="btn btn-white"   type="reset">取消</button>
                                </div>
                            </div>  
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('myjs')
    <!-- 自定义js -->
    <script src="{{URL::asset('static/admin/js/content.js?v=1.0.')}}"></script>
    <script src="{{URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
     <!-- 验证 -->
   
    <!-- Page-Level Scripts -->
    <script>
    // 全选
        function choosebox(o){
          var flag = $(o).is(':checked');

            if(flag){
                $('input[type=checkbox]').prop('checked',true);
            }else{
                $('input[type=checkbox]').removeAttr('checked');
            }
        }
       
        $(document).ready(function(){
            $(":checkbox[cka]").click(function(){
                var $cks = $(":checkbox[ck='"+$(this).attr("cka")+"']");
                if($(this).is(':checked')){
                    $cks.each(function(){$(this).prop("checked",true);});
                }else{
                    $cks.each(function(){$(this).removeAttr('checked');});
                }
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
                    name: {
                        message: '请输入角色名',
                        validators: {
                            notEmpty: {
                                message: '角色名不能为空！'
                            },
                            stringLength: {
                                min: 1,
                                max: 20,
                                message: '角色名的长度在1-20个字符！'
                            },
                           
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
                            window.location.href =  "{{url('admin/role/index')}}";
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
