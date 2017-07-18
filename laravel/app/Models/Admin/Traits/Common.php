<?php
namespace App\Models\Admin\Traits;

Trait Common{

	//获取操作按钮
	public function getOperBtn(){

  		return    '<a class="btn btn-info" href="show/'.$this->id.'"> 查看 </a>
  		<a class="btn btn-warning" href="edit/'.$this->id.'">编辑 </a>
  		<a class="btn btn-danger" onclick="del('.$this->id.')"> 删除</a>';
  		
	}

	/**
	 * 获取当前状态按钮
	 * @param int $status 状态;
	 */
	
	public function getStatusBtn ($status){
		
		switch ($status) {
			case 1:
				$Btn = '<a  onclick="status('.$this->id.',0)"  class="text-success"><i class="glyphicon glyphicon-ok"></i> 启用</a>';
				break;
			case 0:
				$Btn = '<a  onclick="status('.$this->id.',1)" class="text-danger"><i class="glyphicon glyphicon-remove"></i> 禁用 </a>';
				break;
		}
		
		return $Btn;
		
	}

	/**
	 * 排序
	 * @param integer $sort;
	 */
	public function getSort($sort){

		return  '<input type="text" name="sort" style="width:35px;text-align: center;" value="'.$sort.'" class="sort" onblur="sorts('.$this->id.',this)" />';

	}

	




	




}


?>