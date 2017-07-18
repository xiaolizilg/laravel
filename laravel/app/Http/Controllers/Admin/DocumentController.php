<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Document;
use App\Repositories\admin\DocumentRepository;
class DocumentController extends Controller
{
    protected $doc;
    public function  __construct(DocumentRepository $document){

        $this->doc = $document;
    }
    //列表
    public function index()
    {
        $list =  $this->doc->paginate();

        return view('admin.document.index',['list'=>$list]);
    }

    //添加
    public function create()
    {
        return view('admin.document.create');
    }

    //保存
    public function store(Request $request)
    {  
        $this->doc->create($request->all());
        return redirect('admin/document/index');
    }

    //查看
    public function show($id)
    {
       return view('admin.document.show');

    }

    //编辑
    public function edit($id)
    {
        $info =  $this->doc->find($id);
        return view('admin.document.edit',['info'=>$info]);
    }

    //修改
    public function update(Request $request)
    {
        
        $this->doc->update($request->except('_token'));
        return redirect('admin/document/index');
    }

    //删除
    public function del(Request $request)
    {
        $this->doc->del($request->input('id'));
        return response()->json(array('error'=>0,'msg'=>'OK'));
    }

     //排序
    public function sort($id)
    {
        //
    }


    //禁用 启用
    public function status($id)
    {
        //
    }




}
