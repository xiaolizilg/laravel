@extends('admin.public.base')
@section('title','添加菜单')
@section('content')      
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>菜单列表<small>&nbsp添加菜单</small></h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{url('admin/menu/store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">菜单名称</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" placeholder="请输入菜单名称">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">控制器名称</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="controller" placeholder="请输入跳转地址"> 
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
                                <label class="col-sm-2 control-label">选择模式</label>
                                 <div class="col-sm-10">
                                    <div class="radio i-checks isauto-check">
                                        <label>
                                            <input type="radio" value="0" name="is_auto" class="radio_box" checked > <i></i> 空控制器
                                        </label>
                                         <label>
                                            <input type="radio"  value="1" name="is_auto" class="radio_box" > <i></i>自动生成
                                        </label>

                                    </div>
                                </div> 
                            </div> 

                            <div class="operation-select" style="display: none;">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">选择表</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="选择表" id="table" >
                                      
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">生成操作</label>
                                     <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="checkbox" value="option1" name="is_method" > <i></i> 列表
                                            </label>
                                             <label>
                                                <input type="checkbox"  value="0" name="is_method" > <i></i>添加
                                            </label>
                                            <label>
                                                <input type="checkbox" value="option1" name="is_method" > <i></i> 删除
                                            </label>
                                             <label>
                                                <input type="checkbox"  value="0" name="is_method" > <i></i>修改
                                            </label>

                                        </div>
                                    </div> 
                                </div> 

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">模板配置</label>
                                     <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="0" name="is_temp" checked > <i></i> 默认配置
                                            </label>
                                             <label>
                                                <input type="radio"  value="1" name="is_temp"  onclick = "custom()"> <i></i>自定义配置
                                            </label>

                                        </div>
                                    </div> 
                                </div> 


                                <div class="hr-line-dashed"></div>
                                <div class="form-group "  style="display: none;" id="setpz">
                                    <label class="col-sm-2 control-label">模板配置</label>
                                    <div class="form-group">
                                           <div class="col-md-2">
                                              <span   class="help-block m-b-none"  />
                                                    字段名
                                               <span>
                                           </div>

                                          <div class="col-md-2">
                                               <span   class="help-block m-b-none"  />
                                                    输入类型
                                               <span>
                                           </div>

                                           <div class="col-md-1">
                                               <span   class="help-block m-b-none"  />
                                                    默认值
                                               <span>
                                           </div>
                                           <div class="col-md-2">
                                                <span   class="help-block m-b-none"  />
                                                    验证
                                               <span>
                                           </div>
                                            <div class="col-md-2">
                                               <span   class="help-block m-b-none"  />
                                                    自定义规则
                                               <span>
                                           </div>
                                       </div>
                                       <div class="hr-line-dashed"></div>
                                       <div id="my-setting">
                                               

                                       </div>
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

  <!--   <div id="modal-form" class="modal fade" aria-hidden="true">
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
    </div> -->
@endsection
@section('myjs')
    <script src="{{ URL::asset('static/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
     //选择框样式
       /* $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });*/

        // 选择模式
        $(function(){
            $('.radio_box').click(function() {
           // alert(9999);
               var select_type = $('input[name=is_auto]:checked').val();
                // 选择创建操作时
                if (select_type == 1) {
                    $('.operation-select').fadeTo(500, 1);
                } else {
                    $('.operation-select,.stype-box,.data-table,.set-tpl,.page-box,.api-box').hide();
                }
            });


        });

        //自定义模板配置
        function custom(){
            //获取表名
            table = $('#table').val();
            //表名为空提示信息返回false
            if(!table){
                layer.msg('请填写数据表名');
                return false;
            }
            
            //请求表结构
            $.get("{{url('admin/menu/getTable')}}",{table:table},function(rs){
                    if(rs.error == 1){
                        layer.msg(rs.msg);
                        $("#my-setting").html('');
                    }else{
                        //显示配置模板
                        $("#setpz").show();
                        var  html = '';
                        //将要追加的元素置空
                        $("#my-setting").html('');
                        layer.msg('获取成功');
                        //便利返回数据
                        $(rs.data).each(function(index,val){
                           // console.log(index);
                           // console.log(val);
                            html =  '<div class="xuanze'+index+'">'+
                                        '<label class="col-sm-2 control-label"></label>'+
                                        '<div class="form-group">'+
                                            '<div class="col-md-2">'+
                                                '<input  type="text" class="form-control" name ="column[name]['+val.column_comment+']" value="'+val.column_comment+'"/>'+
                                            '</div>'+
                                           '<div class="col-md-2">'+
                                                '<select class="form-control" name="column[type]['+val.column_name+']" >'+
                                                    '<option value="textarea">textarea文本框</option>'+
                                                    '<option value="password">password</option>'+
                                                    '<option value="select">下拉选择</option>'+
                                                    '<option value="checkbox">多选</option>'+
                                                    '<option value="radio">单选</option>'+
                                                    '<option value="time">时间选择</option>'+
                                                    '<option value="time_more">范围时间选择</option>'+
                                                    '<option value="img">单图上传</option>'+
                                                    '<option value="img_more">多图上传</option>'+
                                                    '<option value="editor">编辑器</option>'+
                                                '</select>'+
                                            '</div>'+
                                            '<div class="col-md-1">'+
                                                '<input  type="text" class="form-control" name="column[type][val]" value="" name="column[val]['+val.column_name+']"  placeholder="默认值" />'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                               '<select class="form-control" name="column[rule]['+val.column_name+']">'+
                                                    '<option value="norule">不验证</option>'+
                                                    '<option value="*">必须</option>'+
                                                    '<option value="n">数字</option>'+
                                                    '<option value="s">字符串</option>'+
                                                    '<option value="p">邮编</option>'+
                                                    '<option value="m">手机号</option>'+
                                                    '<option value="e">邮箱</option>'+
                                                    '<option value="url">网址</option>'+
                                                    '<option value="preg">自定义</option>'+
                                                    '<option value="money">金额</option>'+
                                                '</select>'+
                                            '</div>'+
                                             '<div class="col-md-2">'+
                                                '<input  type="text" class="form-control" name="column[add_rule]['+val.column_name+']" placeholder="验证规则" />'+
                                            '</div>'+
                                            '<span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="remove('+index+')"></span>'+
                                        '</div>'+
                                    '</div>'; 

                            //循环追加
                            $("#my-setting").append(html);
                        });   
                    }

            }); 

            
        }

        //移除元素
        function remove(id){
           $('.xuanze'+id).fadeOut("slow",function(){
             $('.xuanze'+id).remove();

           });
                     
        }   


    </script>
@endsection
   
</body>

</html>
