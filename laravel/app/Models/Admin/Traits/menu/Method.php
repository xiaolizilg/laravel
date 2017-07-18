<?php
namespace App\Models\Admin\Traits\menu;

/**
 * 添加模板
 */

Trait Method{


/**
 *  添加index方法
 */

public function indexMethod($data){


$method =
'<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * '.$data['name'].'管理
 * @Author: xiaolizi
 * @Email:  2860265796@qq.com
 * @Date:   '.date("Y-m-d").'
 */

class '.$data['controller']."Controller  ".'extends Controller{

	protected $'.$data['controller'].';

	public function __construct('.$data['controller'].'Repository  $'.$data['controller'].')
	 {
	       $this->'.$data['controller'].' = $'.$data['controller'].';
	 }'.
	  	$this->index($data['controller']).
	  	$this->create($data['controller']).
	  	$this->store($data['controller']).
	  	$this->show($data['controller']).
	  	$this->edit($data['controller']).
	  	$this->updates($data['controller']).
	  	$this->del($data['controller']).
	  	$this->sort($data['controller']).
	  	$this->status($data['controller']).' 	



}';

		// 保存文件
        $file_name = app_path().'/Http/controllers/admin/'.$data['controller'].'Controller.php';
        file_put_contents($file_name, $method);		

	}

public  function  index($name){

return '



	/**
	 * 首页列表数据
	 */
	public  function index(){

	    if(request()->has("keywords")){

	       //分页数据
	       $keywords =  request()->input("keywords");
	       $list     =  $this->admin->searchPage("name",$keywords);
	    }else{
	        $keywords = null;
	        $list  =$this->admin->paginate(); //分页数据
	    }
	    
		return view("admin.'.$name.'.index",["list"=>$list,"keywords"=>$keywords]);

	}';


}



public  function  create($name){

return '


	/**
	 * 添加页
	 */
    public function create()
    {

        return view("admin.'.$name.'.create");
    }';

}


public function  store($name){

return '




	/**
	 * 保存数据
	 * @param $request array;
	 */
	public function store(Request $request)
	{
	   $this->'.$name.'->create($request->all());
	   return response()->json(["error"=>0,"msg"=>"添加成功"]);

	}';

}


public  function  show($name){

return '



	/**
	 * 查看详情
	 * @param  $id ingeger;
	 */
	public function show($id)
	{
	    $info  =  $this->'.$name.'->find($id);
		return view("admin.'.$name.'.show",["info"=>$info]);

	}';

}


public function  edit($name){

return '



	/**
	 * 编辑
	 * @param  $id integer;
	 */
	public function edit($id)
	{
	    $info   = $this->'.$name.'->find($id);
	    return view("admin.'.$name.'.edit"]);
	}';



}
   


public function updates($name){


return  '



	/**
     * 保存修改数据
     * @param  $request array;
     */
    public function update(Request $request)
    {
                
        $post   =  $request->except(["_token"]);
        $result = $this->'.$name.'->update($post);
         return response()->json(array("error"=>0,"msg"=>"更新成功"));
 
    }';



}

    

public function del($name){

return '



    /**
     * 删除数据
     * @param  array  $requset;
     */
    public  function del(Request $request){

        $this->'.$name.'->del($request->input("id"));
        return response()->json(array("error"=>0,"msg"=>"OK"));
    }';



}

    

public function  sort($name){


return  '



	/**
     * 排序
     * @param array $request; 
     */
    public function sort(Request $request){

        $get =  $request->all();
        $this->'.$name.'->sort($get);
        return  response()->json(array("error"=>0,"msg"=>"Ok"));
    }';




}




public function  status($name){

return '  



	/**
     * 禁用 启用
     * @param array $request
     */
    public function status(Request $request){

        $get =  $request->all();
        $this->'.$name.'->status($get);
        return  response()->json(array("error"=>0,"msg"=>"OK"));
    }

    ';



}



  

/**
 * 创建空控制器
 */

public  function  isEmpty($data){


$method =
'<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * '.$data['name'].'管理
 * @Author: xiaolizi
 * @Email:  2860265796@qq.com
 * @Date:   '.date("Y-m-d").'
 */

class '.$data['controller'].'Controller  extends Controller{
	
	

    //首页列表
    public  function  index(){


    	return  "hello  welcome";

    }

}';

		// 保存文件
        $file_name = app_path().'/Http/controllers/admin/'.$data['controller'].'Controller.php';
        file_put_contents($file_name, $method);		

        return  true;
}

















   

}


?>