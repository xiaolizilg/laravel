<?php
namespace App\Repositories\admin;
use App\Models\admin\Menu;
use App\Repositories\admin\BsseRepository;

Class MenuRepository extends BaseRepository{

	const MODEL = Menu::class;

	/**
	 * 创建数据
	 */
 	public  function create($data){
 	
 		//是否创建控制器
 		if ($data['is_auto']  == 1) {

 			$this->store($data);
 			return true;
 		}

 		//创建空控制器
 		$menu =  $this->info($data);
 		if($menu->save()){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}


	/**
	 * 保存数据
	 */

	public  function store($data){

		//创建控制器和文件,方法  index,add，edit,del 

		if ($data['is_temp'] == 1) {
			$menu  =  new menu();
			//创建控制器
			$menu->indexMethod($data);
			//创建模板
			$menu->addIndex($data);

			return  true;
		}

	}




 	//修改数据
 	public function update($data){

 		if(Menu::where('id',$data['id'])->update($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){
		$info = Menu::find($id);
		if($info->delete()){

			return true;
		}
		throw new GeneralException(__('exceptions.backend.create_error'));

	}

	/**
	 * 实例化模型,返回数据
	 * @param array $data  表单数据
     * @param return $menu  转义数据
	 */
	public function info($data){

		$menu  = new Menu();
		$menu->name  = $data['name'];
		$menu->url   = $data['url'];
		$menu->pid   = $data['pid'];
		$menu->icon  = $data['icon'];
		$menu->sataus = 1;

		return $menu;
	}


	

}


