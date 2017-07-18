<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Traits\adminAction\btn;

class AdminAction extends Model
{
    use btn,SoftDeletes;
    
    protected  $table='admin_action';
    protected  $primaryKey = 'id'; //指定主键
    public     $timestamps = true;
    protected  $fillable   =['name','url','pid','status'];
    protected  $dates  = ['deleted_at'];
    
}
