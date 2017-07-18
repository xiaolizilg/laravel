<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Repositories\admin\CategoryRepository;

class CategoryController extends Controller
{

    protected $category;

    public function __construct(CategoryRepository $category){
        $this->cate = $category;
    }



    /**
     * 分类列表
     */
    public function index()
    {
        $list  =  $this->cate->getAll();
       // print_r($list);
       return view('admin.category.index',['list'=>$list]);
    }



    /**
     * 添加页面
     */
    public function create()
    {
        //获取分类列表
        $cate  = $this->cate->getParent();
        return view('admin.category.create',['cate'=>$cate]);
    }



    /**
     * 保存数据 
     * @param $request array;
     */
    public function store(Request $request)
    {
       $post =  $request->except('_token');
       $this->cate->create($post);
       return redirect('admin/category/index');
    }


   /** 
    * 详情页
    * @param $id integer;
    */
    public function show($id)
    {
        $info  =  $this->cate->find($id);
        return view('admin.category.show');
    }


    /**
     * 编辑页面
     * @param $id integer;
     */
    public function edit($id)
    {
        $info  =  $this->cate->find($id);
        $cate  = $this->cate->getParent();
        //print_r($cate);die;
        return view('admin.category.edit',['info'=>$info,'cate'=>$cate]);
    }

    /** 
     * 修改数据
     * @param $request array;
     */
    public function update(Request $request)
    {   
        $post  =  $request->except('_token');
        $this->cate->update($post);
        return redirect('admin/category/index');
    }


   /**
    * 删除数据
    * @param $request  array;
    */
    public function del(Request $request)
    {
        $this->cate->del($request->input('id'));
        return response()->json(array('error'=>0,'msg'=>'OK'));
    }


    /**
     * 修改排序
     * @param $request array;
     */
    public function sort(Request $request){
        $get =  $request->all();
        $this->cate->sort($get);
        return  response()->json(array('error'=>0,'msg'=>'Ok'));
    }


   /**
    * 修改数据状态
    * @param $request array;
    */ 
    public function status(Request $request){
        $get =  $request->all();
        $this->cate->status($get);
        return  response()->json(array('error'=>0,'msg'=>'OK'));
    }




}
