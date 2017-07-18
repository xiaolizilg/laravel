<?php
namespace App\Models\Admin\Traits\adminAction;

Trait Btn{

	//获取操作按钮
	public function getOperBtn($pid){

		if ($pid == 0) {

		return '<a class="btn btn-primary" onclick="insert(1,'.$this->id.')" data-toggle="modal" data-target="#myModal"> 添加 </a>
  		        <a class="btn btn-warning" onclick="insert(2,'.$this->pid.','.$this->id.')" data-toggle="modal" data-target="#myModal">编辑 </a>
  		        <a class="btn btn-danger" onclick="del('.$this->id.')"> 删除</a>';

		}else{
				return  
  		'<a class="btn btn-warning" onclick="insert(2,'.$this->pid.','.$this->id.')" data-toggle="modal" data-target="#myModal">编辑 </a>
  		<a class="btn btn-danger" onclick="del('.$this->id.')"> 删除</a>';

		}

  		
  		
	}


	/**
	 * 排序
	 * @param integer $sort;
	 */
	public function getSort($sort){

		return  '<input type="text" name="sort" style="width:35px;text-align: center;" value="'.$sort.'" class="sort" onblur="sorts('.$this->id.',this)" />';

	}


	/**
	 * 获取当前状态按钮
	 * @param int $status 状态;
	 */

	public function getStatusBtn ($status){
		
		switch ($status) {
			case 1:
				$Btn = '<a data-id="'.$status.'" onclick="status('.$this->id.',0)"  class="text-success"><i class="glyphicon glyphicon-ok"></i> 启用</a>';
				break;
			case 0:
				$Btn = '<a data-id="'.$status.'" onclick="status('.$this->id.',1)" class="text-danger"><i class="glyphicon glyphicon-remove"></i> 禁用 </a>';
				break;
		}
		
		return $Btn;
		
	}



	/**
	 * 获取列表
	 */

	public static function adminList(){

		$data  =  static::where('pid',0)->get();
		foreach ($data as $k => $v) {
			$data[$k]['child'] = static::where('pid',$v['id'])->get();
		}

		return $data;

	}

	





}


?>