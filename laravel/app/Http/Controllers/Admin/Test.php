<?php
					/**
					 * Test管理]
					 * @Author: Careless
					 * @Email:  965994533@qq.com
					 * @Date:   1500286920
					 */
					namespace App\Http\Controllers\Admin;
					use App\Http\Controllers\Controller;
					use Illuminate\Http\Request;

					class Test  extends Controller{
						protected $Test;public function __construct(TestRepository $admin)
					    {
					        $this->admin = $admin;
					    }
					  /**
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

				}}