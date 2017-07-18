<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\AdvsPosition;
use App\Models\admin\Advs;
use App\Repositories\admin\AdvsRepository;
class AdvsController extends Controller
{
    protected $advs;
    public function __construct(AdvsRepository  $advs){

        $this->advs = $advs;

    }

    //
	public function index(){

       $list =  $this->advs->paginate();
      // print_r($list);die;
	   return view('admin.advs.index',['list'=>$list]);
	}

	/**
     * 创建页面展示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $position =  AdvsPosition::all();
       //print_r($position);
       return view('admin.advs.create',['position'=>$position]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');
        $this->advs->create($post);

        return redirect('admin/advs/index');
    }

    /**
     * 显示单条数据.
     *
     * @param  \App\Demo  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $id)
    {
      
    	$info =  User::findOrFail($id);
    	return view('admin.user.show',['info'=>$info]);

    }

    /**
     * 编辑
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $position =  AdvsPosition::all();
       $info  =  $this->advs->getFind($id);
     
       return view('admin.advs.edit',['info'=>$info,'position'=>$position]);
    }

    /**
     * 修改保存数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        //
    }

   //删除
    public  function del(Request $request){

        $this->advs->del($request->input('id'));

        return response()->json(array('error'=>0,'msg'=>'OK'));
    }


    //排序
    public function sort(Request $request){
        $get =  $request->all();
        $this->advs->sort($get);
        return  response()->json(array('error'=>0,'msg'=>'Ok'));
    }


    //禁用 启用

    public function status(Request $request){
        $get =  $request->all();
        $this->advs->status($get);
        return  response()->json(array('error'=>0,'msg'=>'OK'));
    }

    //test
    public function test(){

        $advs  =  new Advs();
        $test  =  $advs->getL(1);
        dd($test);
    }


}
