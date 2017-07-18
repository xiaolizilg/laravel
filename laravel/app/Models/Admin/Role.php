<?php
namespace App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\admin\Traits\Common;

class Role extends Model
{
	use SoftDeletes,Common;

    //表名
    protected $table="role";
    public    $timestamps = true;
    //主键
    public    $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable=['name','admin_id','status','id'];


}
