<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\AdminAction;
use App\Repositories\admin\AdminActionRepository;

/**
 * Explain ：管理权限
 * Author  ：Xiaolizi
 * DATE  : 2017-7-13
 */

class AdminActionController extends Controller{


     protected $adminAct;
    /**
     * 创建新的控制器实例。
     * @param  AdminActionRepository  $adminAction
     * @return void
     */
    public function __construct(AdminActionRepository $adminAction)
    {
        $this->adminAct = $adminAction;
    }


    /**
     * 权限列表
     */
    public function index()
    {
        $list = $this->adminAct->getPaginate();
        return view('admin.admin_action.index',['list'=>$list]);
    }



    /**
     * 保存数据
     * @param  $request  请求数据
     */
    public function store(Request $request)

    {
        
        if($request->has('id')){
            $this->adminAct->update($request->except('_token'));
        }else{
            $this->adminAct->create($request->all());   
        }
        return response()->json(array('error'=>0,'msg'=>'操作成功'));
    }

    /**
     * 修改数据
     * @param  array $request  请求资源 
     * @return Response  响应
     */
    public function edit(Request $request)
    {
        $id     =  $request->input('id');
        $info   = $this->adminAct->find($id);
        return response()->json($info);
    }
    
    /**
     * 删除数据
     *
     * @param   int  $id
     * @return  Response  响应
     */
    public function del(Request $request)
    {
        $info = $this->adminAct->del($request->input('id'));
        return response()->json(['error'=>0,'msg'=>'删除成功']);
    }

    /**
     * 排序
     * @param array $request; 
     */
    public function sort(Request $request){

        $get =  $request->all();
        $this->adminAct->sort($get);
        return  response()->json(array('error'=>0,'msg'=>'操作成功'));
    }

    /**
     * 禁用 启用
     * @param array $request
     */
    public function status(Request $request){

        $get =  $request->all();
        $this->adminAct->status($get);
        return  response()->json(array('error'=>0,'msg'=>'操作成功'));
    }


    
   
}
