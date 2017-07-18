<?php
namespace App\Repositories\admin;
use App\Models\admin\Document;
use App\Repositories\admin\BsseRepository;
use Illuminate\Database\Eloquent\Model;
Class DocumentRepository extends BaseRepository{

	const MODEL = Document::class;
	/**
	 * 创建数据
	 */
 	public  function create($data){

 		$data['status']  =  isset($data['status'])?'1':'0';
 		$data['content'] =  isset($data['editorValue'])?$data['editorValue']:'g';
 		//print_r($data);die;
 		if(Document::create($data)){
 			return true;
 		}

 		throw new GeneralException(__('exceptions.backend.create_error'));

 	}

 	//修改数据
 	public function update($data){
 		//dd($data);
 		$data['status'] = isset($data['status']) ? '1':'0';
 		$data['content'] =  isset($data['editorValue'])?$data['editorValue']:'g';
 		unset($data['editorValue']);
 		if(Document::where('id',$data['id'])->update($data)){
 			return true;
 		}
 		throw new GeneralException(__('exceptions.backend.create_error'));


 	}

 	
	public function del($id){

		$post = Document::find($id);
		if($post->delete()){

			return true;
		}
		throw new GeneralException(__('exceptions.backend.create_error'));

	}

	

}


