<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\admin\UserRepository;

Class UserController extends Controller{

    protected $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
        //dd($this->user);die;

    }




    /**
     * 首页列表数据
     */
	public  function index(){

        if(request()->has('keywords')){
             //分页数据
             $list  = User::where('user_name','like','%'.request()->input('keywords').'%')
                     ->paginate(5); 
        }else{

            $list  = User::paginate(10); //分页数据
           // $list = User::all();
           // dd($list);
        }
        
		return view('admin.user.index',['list'=>$list]);

	}


 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post =  $request->all();
       // print_r($post);die;
       $this->user->create($request->all());
       return redirect('admin/user')->with(['info'=>'ok']);
       /* if(User::create($post)){
       
       }*/
       
    }

    /**
     * 显示单条数据.
     *
     * @param  \App\Demo  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        //print_r($id);
        //User
    	return view('admin.user.show',['info'=>$id]);

    }

    /**
     * 编辑
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $info  =  User::find($id);
      //  print_r($id);
        return view('admin.user.edit',['info'=>$info]);
    }

    /**
     * 修改保存数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,$id)
    {
                
        $post  =  $request->except(['_token']);
        $result =  $this->user->update($id,$post);
        return redirect('admin/user');
 
    }

    /**
     * 删除数据
     整型
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = User::find($id);
        $post->delete();
        $post->trashed();
        return redirect('admin/user');
    }


    //启用 & 禁用
    public  function SetStatus(Request $request){

        $user_id  = $request->input('user_id');
        $data['status']   = $request->input('status');
        $result =User::where('user_id',$user_id)->update($data);

        if($result){

            return response()->json(array('error'=>0,'msg'=>'操作成功'));
        }

    }


	

}

?>