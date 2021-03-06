<?php
namespace App\Models\Admin\Traits\menu;

Trait Attr{

	public   function  repositor($data){


$file =  '

<?php
namespace App\Repositories\admin;
use App\Models\admin\ '.$data['controller'].';
use App\Repositories\admin\BsseRepository;

Class '.$data['controller'].'Repository extends BaseRepository{

	const MODEL = '.$data['controller'].'::class;

	/**
	 * 创建数据
	 */
 	public  function create($data){

 		$admin =  $this->info($data);
 		if($admin->save()){
 			return true;
 		}

 		throw new GeneralException(__("exceptions.backend.create_error"));

 	}

 	//修改数据
 	public function update($data){
 		$data["status"]    =  isset($data["status"]) ? "1":"0";
 		if(Admin::where("id",$data["id"])->update($data)){
 			return true;
 		}

 		throw new GeneralException(__("exceptions.backend.create_error"));


 	}

 	
	public function del($id){
		$info = Admin::find($id);
		if($info->delete()){

			return true;
		}
		throw new GeneralException(__("exceptions.backend.create_error"));

	}


	 //修改状态
    public function status($data){

        return  $this->query()->where("id",$data["id"])->update($data);

    }

     //更改排序
    public function sort($data){

        return  $this->query()->where("id",$data["id"])->update($data);
    }	



	/**
	 * 过滤字段
	 * @param array $data;
	 * return array $admin;
	 */

	public function info($data){

		$'.$data['controller'].' =  new '.$data['controller'].'();
		$solt  =  rand(100000,999999);
		$admin->user_name =  $data["user_name"];
		$admin->password  =  md5($data["password"].$solt);
		$admin->status    =  isset($data["status"]) ? "1":"0";
		$admin->solt      =  $solt;
		$admin->phone     =  $data["phone"];
		$admin->sort      =  $data["sort"];
		$admin->role_id   =  $data["role_id"];

		return $admin;
	}


}';







		// 保存文件
        $file_name = app_path().'/Repositories/admin/'.$data['controller'].'Repository.php';
        file_put_contents($file_name, $file);	

	}



}


?>