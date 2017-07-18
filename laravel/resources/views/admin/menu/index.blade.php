<!DOCTYPE html>
<html>

<head>

   @include('admin.public.head')

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>可编辑表格</h5>
                      
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <a  href="{{url('admin/menu/create')}}" class="btn btn-primary ">添加</a>
                        </div>
                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>菜单名称</th>
                                    <th>链接地址</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $data)
                                <tr class="gradeX">
                                    <td> {{$data->id}}   </td>
                                    <td> {!!$data->name!!} </td>
                                    <td> {{$data->url}}     </td>
                                    <td class="center">{{$data->created_at}}</td>
                                    <td class="center">
                                        <a class="btn btn-primary" href="{{url('admin/menu/info')}}"> 查看 </a>
                                        <a class="btn btn-success" href="{{url('admin/menu/addEdit')}}"> 编辑 </a>
                                        <a class="btn btn-danger" href="{{url('admin/menu/del')}}"> 删除 </a> 
                                       
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.public.footer')
    <!-- Page-Level Scripts -->
    <script>
       
    </script>

    
    

</body>

</html>
