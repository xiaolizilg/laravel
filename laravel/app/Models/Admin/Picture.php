<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //

    protected $table="Picture";
    public $timestamps = false;
    protected $fillable = ['path'];
    

}
