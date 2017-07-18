@extends('layouts.backend')

@section('title', '访问授权')

@section('page_styles')
<link href="{{ asset('backend/assets/plugins/jquery-tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="role">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">访问授权</h4>
            </div>
            <div class="panel-body">
                <table class="table table-profile">
                    <tbody>
                        <tr>
                            <td class="field">角色标识</td>
                            <td>{{ $role->name }}</td>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="field">名称</td>
                            <td>{{ $role->title }}</td>
                        </tr>
                        <tr>
                            <td class="field">群组</td>
                            <td>{{ $role->guard_desc }}</td>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="field">权限ID</td>
                            <td>
                                <form id="set-permission" method="POST" action="{{ route('backend.access.role.set-permission', $role->id) }}">
                                    {!! csrf_field() !!}
                                    {!! method_field('PUT') !!}
                                    <div class="form-group">
                                        <ul class="inverse" id="permission_ids">
                                        </ul>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td class="field">确认授权</td>
                            <td>
                                <button type="button" onclick="javascript:$('#set-permission').submit();" class="btn btn-sm btn-success">授权</button>
                                <a href="{{ route('backend.access.role.index') }}" class="btn btn-sm btn-white">返回</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="permissions">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">数据表</h4>
            </div>
            <div class="panel-body">
                <div class="row m-b-20">
                    <div class="col-xs-4">
                    </div>
                    <div class="col-xs-8">
                        <form class="navbar-form full-width text-right m-0 p-t-0 p-b-0">
                            <div class="form-group">
                                <input type="text" name="search_word" class="form-control" style="display:inline-block;" placeholder="请输入名称..." />
                                <button type="submit" class="btn btn-search" style="right:25px;top:0px;"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>创建时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->title}}</td>
                            <td>{{$permission->created_at}}</td>
                            <td>{!! $permission->status_desc !!}</td>
                            <td><a href="{{ route('backend.access.role.unset-permission', [$role->id, 'permission_id' => $permission->id]) }}" name="unset_permission" class="m-r-5 text-warning"><i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.backend.unset_permission') }}"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ request()->has('search_word') ? $permissions->appends(['search_word' => request()->input('search_word')])->links() : $permissions->links() }}
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>
@endsection

@section('page_scripts')
<script src="{{ asset('backend/assets/js/apps.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-tag-it/js/tag-it.min.js') }}"></script>
@endsection

@section('page_script')
<script>
    $(document).ready(function() {
        App.init();
        $("#permission_ids").tagit({fieldName: "permission_ids[]"});
    });
</script>
@endsection