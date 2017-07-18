<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\admin\Traits\admin\btn;

class Category extends Model
{
	use softDeletes,btn;
	
    protected $table = 'category';
    protected $primaryKey  = 'id';
    public    $timestamps =  true;
   //protected $guarded     = ['_token','editorValue'];  //拒绝写入的字段	
    protected  $fillable  = ['title','status','name','sort','pid'];
    protected  $dates     = ['deleted_at'];
}
