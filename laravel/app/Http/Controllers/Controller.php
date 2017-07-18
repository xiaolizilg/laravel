<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
	 * [underline_to_hump 将下划线命名转换为驼峰式命名]
	 * @param  string $str [要转换的字符串]
	 * @param  boolean $ucfirst [首字母是否大写]
	 */
	function underline_to_hump($str = '', $ucfirst = true)
	{
	    $str = ucwords(str_replace('_', ' ', $str));
	    $str = str_replace(' ', '', lcfirst($str));
	    return $ucfirst ? ucfirst($str) : $str;
	}
  
}
