<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 测试管理
 * @Author: xiaolizi
 * @Email:  2860265796@qq.com
 * @Date:   2017-07-18
 */

class TestController  extends Controller{

	protected $Test;

	public function __construct(TestRepository  $Test)
	 {
	       $this->Test = $Test;
	 }



	/**
	 * 首页列表数据
	 */
	public  function index(){

	    if(request()->has("keywords")){

	       //分页数据
	       $keywords =  request()->input("keywords");
	       $list     =  $this->admin->searchPage("name",$keywords);
	    }else{
	        $keywords = null;
	        $list  =$this->admin->paginate(); //分页数据
	    }
	    
		return view("admin.Test.index",["list"=>$list,"keywords"=>$keywords]);

	}


	/**
	 * 添加页
	 */
    public function create()
    {

        return view("admin.Test.create");
    }




	/**
	 * 保存数据
	 * @param $request array;
	 */
	public function store(Request $request)
	{
	   $this->Test->create($request->all());
	   return response()->json(["error"=>0,"msg"=>"添加成功"]);

	}



	/**
	 * 查看详情
	 * @param  $id ingeger;
	 */
	public function show($id)
	{
	    $info  =  $this->Test->find($id);
		return view("admin.Test.show",["info"=>$info]);

	}



	/**
	 * 编辑
	 * @param  $id integer;
	 */
	public function edit($id)
	{
	    $info   = $this->Test->find($id);
	    return view("admin.Test.edit"]);
	}



	/**
     * 保存修改数据
     * @param  $request array;
     */
    public function update(Request $request)
    {
                
        $post   =  $request->except(["_token"]);
        $result = $this->Test->update($post);
         return response()->json(array("error"=>0,"msg"=>"更新成功"));
 
    }



    /**
     * 删除数据
     * @param  array  $requset;
     */
    public  function del(Request $request){

        $this->Test->del($request->input("id"));
        return response()->json(array("error"=>0,"msg"=>"OK"));
    }



	/**
     * 排序
     * @param array $request; 
     */
    public function sort(Request $request){

        $get =  $request->all();
        $this->Test->sort($get);
        return  response()->json(array("error"=>0,"msg"=>"Ok"));
    }  



	/**
     * 禁用 启用
     * @param array $request
     */
    public function status(Request $request){

        $get =  $request->all();
        $this->Test->status($get);
        return  response()->json(array("error"=>0,"msg"=>"OK"));
    }

     	



}