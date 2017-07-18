<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\admin\Traits\admin\btn;

Class Admin extends Model
{

	use SoftDeletes,Btn;

	protected  $table = 'admin';
	public     $timestamps = true;
	protected  $primaryKey = 'user_id'; //指定主键
	protected  $guarded = ['_token'];

	protected $fillable=['user_name','phone','password','user_id','email'];
	protected $dates = ['deleted_at'];


}







?>