<?php

namespace App\Models;

class Blog extends Defaults
{
    protected $table = 'blog';
    protected $primaryKey = 'gid';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];

    //分页获取数据
    public static function getPaginate($where = [], $field = [], $paginate = 1, $orderby = "", $sort = "DESC")
    {
        return self::where($where)
            ->join('sort',function($join){
                        $join->on('sort.sid','=','blog.sortid');
                    })
            ->select($field)
            ->orderby($orderby,$sort)
            ->paginate($paginate);
    }


}
