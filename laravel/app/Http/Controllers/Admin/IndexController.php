<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Menu;
use Illuminate\Support\Facades\DB;

Class IndexController extends Controller
{



	/**
	 * 系统信息
	 */
	public function index()
	{
		$nav  =  Menu::where('status','1')->orderBy('sort','desc')->get();
		return view('admin.index.index',['nav'=>$nav]);
	}

	// 欢迎页面
	public function welcome()
	{
		//系统配置信息
		$sys_info  =  $this->get_sys_info();
		return view('admin.index.welcome',$sys_info);
	}



	//系统信息
	public function get_sys_info()
	{
		$sys_info['os']             = PHP_OS;
		$sys_info['zlib']           = function_exists('gzclose') ? 'YES' : 'NO';//数据压缩
		$sys_info['safe_mode']      = (boolean) ini_get('safe_mode') ? 'YES' : 'NO';//安全模式
		$sys_info['timezone']       = function_exists("date_default_timezone_get") ? date_default_timezone_get() : "no_timezone";
		$sys_info['curl']			= function_exists('curl_init') ? 'YES' : 'NO';	
		$sys_info['web_server']     = $_SERVER['SERVER_SOFTWARE'];
		$sys_info['phpv']           = phpversion();
		$sys_info['ip'] 			= GetHostByName($_SERVER['SERVER_NAME']);
		$sys_info['fileupload']     = @ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown';
		$sys_info['max_ex_time'] 	= @ini_get("max_execution_time").'s'; //脚本最大执行时间
		$sys_info['set_time_limit'] = function_exists("set_time_limit") ? true : false;
		$sys_info['domain'] 		= $_SERVER['HTTP_HOST'];
		$sys_info['memory_limit']   = ini_get('memory_limit');	                                
		$mysqlinfo = Db::query("SELECT VERSION() as version");
		if(function_exists("gd_info")){
			$gd = gd_info();
			$sys_info['gdinfo'] 	= $gd['GD Version'];
		}else {
			$sys_info['gdinfo'] 	= "未知";
		}
		
		return $sys_info;
    }





}


?>