<?php
namespace App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\admin\Traits\admin\btn;
class AdvsPosition extends Model
{
    use SoftDeletes,Btn;

	protected  $table = 'advs_position';
	public     $timestamps = true;
	protected  $primaryKey = 'id'; //指定主键
	protected  $fillable   = ['name','title','sort','desc','status','id'];
	protected  $dates      = ['deleted_at'];

	// 获取所有列表
	public function  getAllList($map){

		return  $this->where($map)->get();


	}
	//获取单条数据
	public function  getByFind($map){

		return $this->where($map)->first();

	}

	//添加数据
	public function  createData($data){

		return $this->create($data);

	}

	//修改数据
	public  function edit($map){


		return $this->where($map)->update();
	}


	//删除数据

	public  function  del($id){
		$info = $this->find($id);
		$info->delete();
		return $info->trashed();
	}


}
