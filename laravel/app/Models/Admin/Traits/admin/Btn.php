<?php
namespace App\Models\Admin\Traits\admin;

Trait Btn{

	//获取操作按钮
	public function getOperBtn(){

  		return    '<a class="btn btn-info" href="/admin/admin/show/'.$this->user_id.'"> 查看 </a>
  		<a class="btn btn-warning" href="/admin/admin/edit/'.$this->user_id.'">编辑 </a>
  		<a class="btn btn-danger" onclick="del('.$this->user_id.')"> 删除</a>';
  		
	}

	/**
	 * 获取当前状态按钮
	 * @param int $status 状态;
	 */
	
	public function getStatusBtn ($status){
		
		switch ($status) {
			case 1:
				$Btn = '<a  onclick="status('.$this->user_id.',0)"  class="text-success"><i class="glyphicon glyphicon-ok"></i> 启用</a>';
				break;
			case 0:
				$Btn = '<a  onclick="status('.$this->user_id.',1)" class="text-danger"><i class="glyphicon glyphicon-remove"></i> 禁用 </a>';
				break;
		}
		
		return $Btn;
		
	}

	/**
	 * 排序
	 * @param integer $sort;
	 */
	public function getSort($sort){

		return  '<input type="text" name="sort" style="width:35px;text-align: center;" value="'.$sort.'" class="sort" onblur="sorts('.$this->user_id.',this)" />';

	}


	

	/*public function getStatusBtn ($status){
		
		switch ($status) {
			case 1:
				$Btn = '<a data-id="'.$status.'" onclick="status('.$this->id.',0)"  class="text-success"><i class="glyphicon glyphicon-ok"></i> 启用</a>';
				break;
			case 0:
				$Btn = '<a data-id="'.$status.'" onclick="status('.$this->id.',1)" class="text-danger"><i class="glyphicon glyphicon-remove"></i> 禁用 </a>';
				break;
		}
		
		return $Btn;
		
	}*/





	/*
	public function AdminList(){

		$data  =  $this->where('pid',0)->get();
		foreach ($data as $k => $v) {
			$data[$k]['child'] = $this->where('pid',$v['id'])->get();
		}

		return $data;

	}

	
  if($pid == '0'){

	   		return '<a class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="inse('.$this->id.')"> 添加 </a>
	            <a class="btn btn-success "  data-toggle="modal" data-target="#myModal" onclick="insert('.$this->id.')"> 编辑 </a>
	            <a class="btn btn-danger" href="del/'.$this->id.'" > 删除</a>';
	   }else{
	   		return '
	            <a class="btn btn-success "  data-toggle="modal" data-target="#myModal" onclick="insert('.$this->id.')"> 编辑 </a>
	            <a class="btn btn-danger" href="del/'.$this->id.'" > 删除</a>';

	   }*/




}


?>