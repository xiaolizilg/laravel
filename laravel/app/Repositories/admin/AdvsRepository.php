<?php
namespace App\Repositories\admin;
use App\Models\admin\Advs;
use App\Repositories\admin\BsseRepository;
use Illuminate\Support\Facades\DB;
Class AdvsRepository extends BaseRepository{

	const MODEL = advs::class;
	/**
	 * 创建数据
	 */
 	public  function create($data){

 		$data['status']  =  isset($data['status'])?'1':'0';
 		if(advs::create($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}

 	//修改数据
 	public function update($id,$data){

 		$data['status'] = isset($data['status']) ? '1':'0';
 		if(User::where('user_id',$id)->update($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){
		//echo $id;die;
		$post = Advs::find($id);
		if($post->delete()){

			return true;
		}
		throw new GeneralException(__('exceptions.backend.create_error'));

	}

	//获取无级分类列表
	public function getByList($pid= '0',$data=array(),$nbsp='0'){

		$result =  $this->getByAll(['pid'=>$pid]);
		//print_r($result);die;
		$nbsp +=2; 
		if($result){
			foreach($result as $val){
				$val->btn = $val->getBtn($val['pid']);
            	$val->statusBtn= $val->getStatusBtn($val->status); 
            	$val->name =  str_repeat('&nbsp',$nbsp).'|--'.$val->name;
				$data[] =$val;
				$data   = $this->getByList($val['id'],$data,$nbsp);
			}
		}
		return $data;
		
	}


	public function  getFind($id){

		return Advs::leftJoin('picture as p', 'p.id', '=', 'advs.img')
					->where('advs.id',$id)
					->first();
	}


}


