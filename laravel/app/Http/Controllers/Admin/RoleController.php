<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Role;
use App\Repositories\admin\RoleRepository;
use App\Models\admin\AdminAction;

class RoleController extends Controller
{
    protected $role;
    public  function __construct(RoleRepository $role){

        $this->role = $role;
 
    }
   //首页
    public function index()
    {
        if(request()->has('keywords')){
           //分页数据
           $keywords =  request()->input('keywords');
           $list     =  $this->role->searchPage('name',$keywords);
        }else{
           $keywords = '';
           $list  =  $this->role->paginate();
        }
        
        return view('admin.role.index',['list'=>$list,'keywords'=>$keywords]);
    }

    //添加页
    public function create()
    {
       $admin =  AdminAction::adminList();
       return view('admin.role.create',['admin'=>$admin]);
    }

    /**
     *  保存添加数据
     * @param Request  $request
     */
    public function store(Request $request)
    {

           $this->role->create($request->all());
           return response()->json(['error'=>0,'msg'=>'添加成功']);

    }

    /**
     * 查看页面
     * @param  int  $id
     */
    public function show(Role $info)
    {
       return view('admin.role.show');
    }

    /**
     * @param  int  $id
     * 编辑页面
     */
    public function edit($id)
    {
         $admin  =  AdminAction::adminList();
         $info   =  $this->role->find($id);
         $info['admin_id'] = explode(',',$info['admin_id']);
        return view('admin.role.edit',['info'=>$info,'admin'=>$admin]);
    }

    /**
     * 保存修改数
     * @param  int  $id
     */
    public function update(Request $request)
    {
       $post  =  $request->except(['_token']);
       $this->role->update($post);
       
       return response()->json(['error'=>0,'msg'=>'更新成功']);
    }

    /**
     * 删除数据
     *
     * @param   int  $id
     * @return  Response  响应
     */
    public function del(Request $request)
    {
        $this->role->del($request->input('id'));
        return response()->json(['error'=>0,'msg'=>'删除成功']);
    }

    /**
     * 排序
     * @param array $request; 
     */
    public function sort(Request $request){

        $get =  $request->all();
        $this->role->sort($get);
        return  response()->json(array('error'=>0,'msg'=>'操作成功'));
    }

    /**
     * 禁用 启用
     * @param array $request
     */
    public function status(Request $request){

        $get =  $request->all();
        $this->role->status($get);
        return  response()->json(array('error'=>0,'msg'=>'操作成功'));
    }







}
