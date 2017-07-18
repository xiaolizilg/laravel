<?php
namespace App\Repositories\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Category;
use App\Repositories\admin\BsseRepository;
use Illuminate\Support\Facades\DB;

Class CategoryRepository extends BaseRepository{

	const MODEL = Category::class;
	/**
	 * 创建数据
	 */
 	public  function create($data){

 		$data['status']  =  isset($data['status'])?'1':'0';
 
 		//print_r($data);die;
 		if(Category::create($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}

 	//修改数据
 	public function update($data){
 		//dd($data);
 		$data['status'] = isset($data['status']) ? '1':'0';
 		$data['content'] =  isset($data['editorValue'])?$data['editorValue']:'g';
 		unset($data['editorValue']);
 		if(Category::where('id',$data['id'])->update($data)){
 			return true;
 		}
 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){

		$post = Category::find($id);
		if($post->delete()){
			return true;
		}
		throw new GeneralException(__('exceptions.backend.create_error'));

	}

	//获取父级分类
	public function getParent($pid='0',$data=array(),$nbsp="0"){

		$list = DB::table('Category')->where('pid',$pid)->get();
		$nbsp += 2;
		if($list){
			foreach ($list as $v) {
				$v->title =   str_repeat('&nbsp',$nbsp).'|--'.$v->title;
			//	$v->status = $v->getStatusBtn($v->status); 
				$data[]   = $v;
				$data =  $this->getParent($v->id,$data,$nbsp);
			}
		}
		
		return $data;

	}

	

}


