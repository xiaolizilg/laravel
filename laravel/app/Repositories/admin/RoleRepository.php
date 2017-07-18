<?php
namespace App\Repositories\admin;
use App\Models\admin\Role;
use App\Repositories\admin\BsseRepository;

Class RoleRepository extends BaseRepository{

	const MODEL = role::class;
	/**
	 * 创建数据
	 */
 	public  function create($data){
 		$role =  $this->info($data);
 		if($role->save()){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}

 	//修改数据
 	public function update($data){
 		$data['admin_id'] =  implode(',',$data['admin_id']);
 		if(Role::where('id',$data['id'])->update($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){

		$info = Role::find($id);
		if($info->delete()){

			return true;
		}
		throw new GeneralException(__('exceptions.backend.create_error'));

	}


	public function info($data){

		$role =  new Role ();

		$role->name     =  $data['name'];
		$role->admin_id =  implode(',',$data['admin_id']);
		$role->status   = 1;

		return $role;
	}
	

}


