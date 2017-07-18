<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\AdvsPosition;
use App\Repositories\admin\AdvsPositionRepository;

class AdvsPositionController extends Controller
{	
	protected $advs_pos;
	public function __construct(AdvsPositionRepository $advs_pos){

		$this->advs_pos = $advs_pos;
		//dd($this->advs_pos);
	}


    //首页
	public function  index(){
		$list  = $this->advs_pos->paginate();
		return view('admin/advs_position/index',['list'=>$list]);
	}



	//添加页
	public function create(){

		return view('admin/advs_position/create');
	}



	//添加保存
	public function store(Request $request){

		$data =  $request->except('_token');
		$this->advs_pos->create($data);
		return redirect('admin/advsposition/index');

	}



	//编辑页
	public function  edit($id){
		$info =  $this->advs_pos->find($id);
		return view('admin.advs_position.edit',['info'=>$info]);
	}



	//保存修改
	public function update(Request $request){

		$data =  $request->except('_token');	
		$this->advs_pos->update($data);

		return redirect('admin/advsposition/index');
	}


	//删除
	public  function del(Request $request){

		$this->advs_pos->del($request->input('id'));

		return response()->json(array('error'=>0,'msg'=>'OK'));
	}


	//排序
	public function sort(Request $request){
		$get =  $request->all();
		$this->advs_pos->sort($get);
		return  response()->json(array('error'=>0,'msg'=>'Ok'));
	}


	//禁用 启用

	public function status(Request $request){
		$get =  $request->all();
		$this->advs_pos->status($get);
		return  response()->json(array('error'=>0,'msg'=>'OK'));
	}

}
