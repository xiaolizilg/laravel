<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\admin\Traits\menu\Temp;
use App\Models\admin\Traits\menu\Method;
use App\Models\admin\Traits\menu\Attr;

/**
 * 菜单管理
 */

Class Menu   extends Model{


	use Temp,Method,Attr;

	protected  $table = 'menu';
	public     $timestamps = true;
	protected  $fillable=['name','url','icon','pid'];


	/**
	 *  获取所有菜单  
	 */

	public  function getList($pid='0',$data = array(),$spac='0'){

	    $list =  $this->where('pid',$pid)->get();

		$spac+=2;
        if($list){
            foreach ($list as $v) {

                $v['name'] =  str_repeat('&nbsp',$spac).'|--'.$v['name'];
                $data[]    =  $v;
                $data      =  $this->getList($v['id'],$data,$spac);
            }
        }

		return $data ;
	}






}










?>