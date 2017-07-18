<?php
namespace App\Repositories\admin;
use App\Models\admin\Admin;

Class BaseRepository {


 	public function getAll()
    {
       
        $data =  $this->query()->get();
        foreach ($data as $va) {
            $va->statusBtn = $va->getStatusBtn($va->status);
        }
        return $data;
    }

    public function getByAll($map)
    {
        return $this->query()->where($map)->get();
    }


    public function getCount()
    {
        return $this->query()->count();
    }
    //根据主键id 查询单条数据
    public function find($id)
    {
        return $this->query()->find($id);
    }
    //符合条件的第一条数据
    public function findBy(array $where)
    {
        return $this->query()->where($where)->first();
    }
    //符合条件的分页数据
    public function paginate(array $where = [])
    {
        
       $list  = $this->query()->where($where)->orderBy('sort','desc')->paginate(10);
       foreach ($list as  $va) {
             $va->statusBtn = $va->getStatusBtn($va->status);
             $va->sort      = $va->getSort($va->sort);
             $va->operateBtn = $va->getOperBtn();
       }
       return  $list;
    }
    //搜索分页数据
    public function searchPaginate(array $search, array $where = [])
    {
        list($name, $words) = $search;

        return $this->query()->where($name, 'LIKE', $words)->where($where)->paginate(10);
    }
    //删除分页数据
    public function deletedPaginate(array $where = [])
    {
        return $this->query()->onlyTrashed()->where($where)->paginate(10);
    }
    //搜索删除分页数据
    public function searchDeletedPaginate(array $search, array $where = [])
    {
        list($name, $words) = $search;

        return $this->query()->onlyTrashed()->where($name, 'LIKE', $words)->where($where)->paginate(10);
    }

    //更改排序
    public function sort($data){

        return  $this->query()->where('id',$data['id'])->update($data);
    }

    //修改状态
    public function status($data){
        return  $this->query()->where('id',$data['id'])->update($data);

    }

    /**
     * 模糊查询分页数据
     * @param string $name  需要匹配的字段
     * @param string $keywords  匹配关键字
     * @param integer $limiet  限制条数
     */
    public function  searchPage($name,$keywords,$limit='10'){

        $list = $this->query()->where([[$name,'like','%'.$keywords.'%']])->paginate($limit);
        foreach ($list as  $v) {
            $v->$name = str_replace($keywords,"<font color='red'>".$keywords."</font>",$v->$name);
            $v->statusBtn  = $v->getStatusBtn($v->status);
            $v->sort       = $v->getSort($v->sort);
            $v->operateBtn = $v->getOperBtn();
        }

        return $list;
    }





    /**
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }



}













?>