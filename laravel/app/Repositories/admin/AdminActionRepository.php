<?php
namespace App\Repositories\admin;
use App\Models\admin\AdminAction;
use App\Repositories\admin\BsseRepository;

Class AdminActionRepository extends BaseRepository{

	const MODEL = AdminAction::class;

	/**
	 * 创建数据
	 */
 	public  function create($data){

 		$adminAct =  $this->info($data);
 		if($adminAct->save()){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}

 	//修改数据
 	public function update($data){

 		if(AdminAction::where('id',$data['id'])->update($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){
		$info = AdminAction::find($id);
		if($info->delete()){

			return true;
		}
		throw new GeneralException(__('exceptions.backend.create_error'));

	}

	public function info($data){

		$adminAct  = new AdminAction();
		$adminAct->name  = $data['name'];
		$adminAct->url   = $data['url'];
		$adminAct->pid   = $data['pid'];
		$adminAct->sataus = 1;

		return $adminAct;
	}



	//获取无级分类列表
	public function getPaginate($pid ='0',$data=array(),$nbsp='0'){
		
		$result =  AdminAction::where(['pid'=>$pid])->orderBy('sort','desc')->get();
		$nbsp +=2; 

		if($result){
			foreach($result as $v){
            	$v->statusBtn= $v->getStatusBtn($v->status); 
            	$v->operateBtn = $v->getOperBtn($v->pid);
            	$v->sort      = $v->getSort($v->sort);
            	$v->name =  str_repeat('&nbsp',$nbsp).'|--'.$v->name;
				$data[] =$v;
				$data   = $this->getPaginate($v['id'],$data,$nbsp);
			}
		}
		return $data;
		
	}


}


