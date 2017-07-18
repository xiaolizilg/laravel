<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//首页
Route::get('/', function () {
    return view('welcome');
});

//登陆
Route::post('auth/ulogin/login','auth\UloginController@login');
Route::get('logout','auth\UloginController@logout')->name('logout');
Route::get('auth/ulogin/index','auth\UloginController@index');


//后台路由
Route::group(['middleware'=>['isLogin'],'prefix' =>'admin','namespace' =>'admin'],function(){

        //首页
        Route::get('index','IndexController@index');
        Route::get('welcome','IndexController@welcome');
        Route::get('recycle','IndexController@recycle');

        //管理员
        Route::get('admin/index','AdminController@index');
        Route::get('admin/create','AdminController@create');
        Route::get('admin/edit/{id}','AdminController@edit');
        Route::get('admin/del','AdminController@del');
        Route::post('admin/update','AdminController@update');
        Route::get('admin/show/{id}','AdminController@show');
        Route::post('admin/store','AdminController@store');
        Route::get('admin/status','AdminController@status');
        Route::get('admin/sort','AdminController@sort');

         //权限
        Route::get('adminAction/index','AdminActionController@index');
        Route::post('adminAction/store','AdminActionController@store');
        Route::get('adminAction/edit/{id?}','AdminActionController@edit');
        Route::get('adminAction/del','AdminActionController@del');
        Route::get('adminAction/status','AdminActionController@status');
        Route::get('adminAction/sort','AdminActionController@sort');

        //角色
        Route::get('role/index','RoleController@index');
        Route::get('role/create','RoleController@create');
        Route::post('role/store','RoleController@store');
        Route::get('role/edit/{id}','RoleController@edit');
        Route::post('role/update','RoleController@update');
        Route::get('role/del','RoleController@del');
        Route::get('role/status','RoleController@status');
        Route::get('role/sort','RoleController@sort');

          //菜单
        Route::get('menu/index','MenuController@index');
        Route::get('menu/create','MenuController@create');
        Route::post('menu/store','MenuController@store');
        Route::get('menu/getTable','MenuController@getTable');
        
        //广告
        Route::get('advs/create','AdvsController@create');
        Route::post('advs/store','AdvsController@store');
        Route::get('advs/edit/{id}','AdvsController@edit');
        Route::post('advs/update','AdvsController@update');
        Route::get('advs/status','AdvsController@status');
        Route::get('advs/del','AdvsController@del');
        Route::get('advs/sort','AdvsController@sort');
        Route::get('advs/test','AdvsController@test');


        //文章
        Route::get('document/index','DocumentController@index');
        Route::get('document/create','DocumentController@create');
        Route::post('document/store','DocumentController@store');
        Route::get('document/edit/{id}','DocumentController@edit');
        Route::post('document/update','DocumentController@update');
        Route::get('document/status','DocumentController@status');
        Route::get('document/del','DocumentController@del');
        Route::get('document/sort','DocumentController@sort');
        Route::get('document/test','DocumentController@test');

        //分类
        Route::get('category/index','CategoryController@index');
        Route::get('category/create','CategoryController@create');
        Route::post('category/store','CategoryController@store');
        Route::get('category/edit/{id}','CategoryController@edit');
        Route::post('category/update','CategoryController@update');
        Route::get('category/status','CategoryController@status');
        Route::get('category/del','CategoryController@del');
        Route::get('category/sort','CategoryController@sort');
        Route::get('category/test','CategoryController@test');

        //上传
        Route::post('admin/uploade/uploadImg','admin\UploadeController@uploadImg');



      

        //广告管理
        Route::get('advs/index', 'AdvsController@index');


        Route::get('advsposition/index','AdvsPositionController@index');
        Route::get('advsposition/create','AdvsPositionController@create');
        Route::get('advsposition/edit/{id}','AdvsPositionController@edit');
        Route::post('advsposition/upimg','AdvsPositionController@uploadImg');
        Route::post('advsposition/store','AdvsPositionController@store');
        Route::post('advsposition/update','AdvsPositionController@update');
        Route::get('advsposition/del','AdvsPositionController@del');
        Route::get('advsposition/sort','AdvsPositionController@sort');
        Route::get('advsposition/status','AdvsPositionController@status');


});

