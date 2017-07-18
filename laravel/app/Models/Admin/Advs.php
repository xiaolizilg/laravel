<?php

namespace App\models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Traits\admin\Btn;
class Advs extends Model
{
	use SoftDeletes,Btn;
    protected $table 	= "advs";
    protected $fillable = ['title','id','desc','position','status','sort','img','url'];
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates      = ['deleted_at'];


}
