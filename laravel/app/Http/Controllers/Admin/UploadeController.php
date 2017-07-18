<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Picture;
class UploadeController extends Controller
{
    
	//图片上传
    public function uploadImg(Request $request){
    
    	$path  =  $request->file('file')->store('upload');
    	$path  = '/Uploads/'.$path;
    	$info = Picture::create(['path'=>$path]);
    	return response()->json(['msg'=>$info]);
    }
}
