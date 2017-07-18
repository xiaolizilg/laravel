<?php

namespace App\models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\admin\Traits\admin\btn;
class Document extends Model
{
	use softDeletes,btn;
    protected $table='document';
    public    $timestamps =  true;
    protected $primaryKey =  'id';
    protected $guarded     = ['_token','editorValue'];  //拒绝写入的字段	
    protected  $fillable  = ['title','status','content','sort','desc','cover_id','cate_id'];
    protected  $dates     = ['deleted_at'];
}
