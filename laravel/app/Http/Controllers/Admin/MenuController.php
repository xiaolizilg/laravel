<?php
namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use App\Repositories\admin\MenuRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

Class  MenuController extends Controller{

	protected $menu;

	public  function __construct(MenuRepository  $menu){

		$this->menu =  $menu;
	}





	public  function index(){

		$menu = new menu();
		$list  = $menu->getList();

		return view('admin.menu.index',['list'=>$list]);
	}


	public  function addEdit(Request $request){

		if($request->isMethod('post')){

			$post  =  $request->all();
			if(Menu::create($post)){

				return redirect('admin/menu/index');
			}else{

				return redirect('admin/menu/index')->with('操作失败');
			}
		}else{
			$menu = Menu::where('pid',0)->get();
	 	}


		return view('admin.menu.addEdit',['menu'=>$menu]);
	}


	/**
	 * 添加菜单 
	 */

	public  function  create(){


		return view('admin.menu.create');

	}

	/**
	 * 保存数据
	 */
	public  function  store(Request $request){

		$this->menu->create($request->all());
		return  response()->json(['error'=>0,'msg'=>'添加成功']);
	}


	/**
	 *  获取表数据
 	 */
  	
  	public function getTable(Request $request){

  		$t_name = $request->input('table');

		if(!Schema::hasTable($t_name)) return response()->json(['error'=>1,'msg'=>'该表不存在']);
		
  		$data = DB::select("select column_name, column_comment FROM information_schema.columns where table_schema = 'laravel' AND table_name ='la_".$t_name."'");

  		return response()->json(['error'=>0,'data'=>$data]);

  	}







}


?>