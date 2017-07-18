<?php
namespace App\Repositories\admin;
use App\Models\admin\Admin;
use App\Repositories\admin\BsseRepository;

Class AdminRepository extends BaseRepository{

	const MODEL = Admin::class;
	/**
	 * 创建数据
	 */
 	public  function create($data){

 		$admin =  $this->info($data);
 		if($admin->save()){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}

 	//修改数据
 	public function update($data){
 			$data['status']    =  isset($data['status']) ? '1':'0';
 		if(Admin::where('user_id',$data['user_id'])->update($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){
		$info = Admin::find($id);
		if($info->delete()){

			return true;
		}
		throw new GeneralException(__('exceptions.backend.create_error'));

	}


	 //修改状态
    public function status($data){

        return  $this->query()->where('user_id',$data['user_id'])->update($data);

    }

     //更改排序
    public function sort($data){

        return  $this->query()->where('user_id',$data['user_id'])->update($data);
    }	


	/*//获取无级分类列表
	public function getByList($pid= '0',$data=array(),$nbsp='0'){

		$result =  $this->getByAll(['pid'=>$pid]);
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
		
	}*/


	/**
	 * 过滤字段
	 * @param array $data;
	 * return array $admin;
	 */

	public function info($data){

		$admin =  new Admin();
		$solt  =  rand(100000,999999);
		$admin->user_name =  $data['user_name'];
		$admin->password  =  md5($data['password'].$solt);
		$admin->status    =  isset($data['status']) ? '1':'0';
		$admin->solt      =  $solt;
		$admin->phone     =  $data['phone'];
		$admin->sort      =  $data['sort'];
		$admin->role_id   =  $data['role_id'];

		return $admin;
	}


}


