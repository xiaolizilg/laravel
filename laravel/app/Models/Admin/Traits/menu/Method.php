<?php
namespace App\Models\Admin\Traits\menu;

/**
 * 添加模板
 */

Trait Method{

	public function indexMethod($data){


		$method =  '<?php
					/**
					 * '.$data['controller'].'管理]
					 * @Author: Careless
					 * @Email:  965994533@qq.com
					 * @Date:   '.time('Y-m-d').'
					 */
					namespace App\Http\Controllers\Admin;
					use App\Http\Controllers\Controller;
					use Illuminate\Http\Request;

					class '.$data['controller']."  ".'extends Controller{
						protected $'.$data['controller'].';'.

					    'public function __construct('.$data['controller'].'Repository $admin)
					    {
					        $this->admin = $admin;
					    }
					  '.$this->index().'}';

		// 保存文件
        $file_name = app_path().'/Http/controllers/admin/'.$data['controller'].'.php';
        //echo $file_name;die;
        file_put_contents($file_name, $method);		

	}


	public  function  index(){

		return '/**
			     * 首页列表数据
			     */
				public  function index(){

			        if(request()->has(keywords)){

			           //分页数据
			           $keywords =  request()->input(keywords);
			           $list     =  $this->admin->searchPage(user_name,$keywords);
			        }else{
			            $keywords = null;
			            $list  =$this->admin->paginate(); //分页数据
			        }
			        
					return view("admin.admin.index",["list"=>$list,"keywords"=>$keywords]);

				}';

	}

   

}


?>