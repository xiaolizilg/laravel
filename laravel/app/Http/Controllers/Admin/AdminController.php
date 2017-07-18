<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\admin\AdminRequest;
use App\Repositories\admin\AdminRepository;
use App\Models\Admin\Role;

/**
 * 
 * Explain: 管理员管理
 * Author: Xiaolizi
 * Date: 2017-7-13
 */


Class AdminController extends Controller{

    protected $admin;

    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }


    /**
     * 首页列表数据
     */
	public  function index(){

        if(request()->has('keywords')){

           //分页数据
           $keywords =  request()->input('keywords');
           $list     =  $this->admin->searchPage('user_name',$keywords);
        }else{
            $keywords = '';
            $list  =$this->admin->paginate(); //分页数据
        }
        
		return view('admin.admin.index',['list'=>$list,'keywords'=>$keywords]);

	}



    /**
     * 添加
     */
    public function create()
    {
        $roles  =  Role::where(['status'=>1])->get();
        return view('admin.admin.create',['roles'=>$roles]);
    }



    /**
     * 保存数据
     * @param $request array;
     */
    public function store(AdminRequest $request)
    {
       $this->admin->create($request->all());
       return response()->json(['error'=>0,'msg'=>'添加成功']);
    
    }



    /**
     * 查看详情
     * @param  $id ingeger;
     */
    public function show($id)
    {
        $info  =  $this->admin->find($id);
    	return view('admin.admin.show',['info'=>$info]);

    }



    /**
     * 编辑
     * @param  $id integer;
     */
    public function edit($id)
    {
        $roles  =  Role::where(['status'=>1])->get();
        $info   = $this->admin->find($id);
        return view('admin.admin.edit',['info'=>$info,'roles'=>$roles]);
    }



    /**
     * 保存修改数据
     * @param  $request array;
     */
    public function update(Request $request)
    {
                
        $post   =  $request->except(['_token']);
        $result = $this->admin->update($post);
         return response()->json(array('error'=>0,'msg'=>'更新成功'));
 
    }



    /**
     * 删除数据
     * @param  array  $requset;
     */
    public  function del(Request $request){

        $this->admin->del($request->input('id'));
        return response()->json(array('error'=>0,'msg'=>'OK'));
    }



    /**
     * 排序
     * @param array $request; 
     */
    public function sort(Request $request){

        $get =  $request->all();
        $this->admin->sort($get);
        return  response()->json(array('error'=>0,'msg'=>'Ok'));
    }



    /**
     * 禁用 启用
     * @param array $request
     */
    public function status(Request $request){

        $get =  $request->all();
        $this->admin->status($get);
        return  response()->json(array('error'=>0,'msg'=>'OK'));
    }

	

}

?>