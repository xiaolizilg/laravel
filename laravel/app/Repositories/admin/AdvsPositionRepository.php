<?php
namespace App\Repositories\admin;
use App\Models\admin\AdvsPosition;
use App\Repositories\admin\BsseRepository;
use Illuminate\Database\Eloquent\Model;
Class AdvsPositionRepository extends BaseRepository{

	const MODEL = AdvsPosition::class;
	/**
	 * 创建数据
	 */
 	public  function create($data){

 		$data['status']  =  isset($data['status'])?'1':'0';
 		if(AdvsPosition::create($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}

 	//修改数据
 	public function update($data){

 		$data['status'] = isset($data['status']) ? '1':'0';
 		if(AdvsPosition::where('id',$data['id'])->update($data)){
 			return true;
 		}
 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){

		$post = AdvsPosition::find($id);
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


}


