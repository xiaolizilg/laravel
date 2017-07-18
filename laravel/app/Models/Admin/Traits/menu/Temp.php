<?php
namespace App\Models\Admin\Traits\menu;

/**
 * 添加模板
 */

Trait Temp{


	//添加index模板		
	public function addIndex($data){


		 $index = '<div class="row"></div>';

         //保存地址
         $temp_name = base_path().'/resources/views/admin/test/'; 
         // echo $temp_name;die;  
         // $dir = APP_PATH . 'admin/view/' . $controller;
          is_dir($temp_name) || mkdir($temp_name, 0777, true);

          file_put_contents($temp_name . '/index.blade.html', $index);

       //  file_put_contents($temp_name, $index);

       return true;
	}


	//添加create模板
	public function   addCreate(){



	}

	//添加edit模板
	public function addEdit(){


	}


}


?>