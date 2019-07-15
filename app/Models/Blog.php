<?php

namespace App\Models;

class Blog extends Defaults
{
    protected $table = 'blog';
    protected $primaryKey = 'id';

    //分页获取数据
    public static function getPaginate($where = [], $field = [], $paginate = 1, $orderby = "", $sort = "DESC")
    {
        return self::where($where)
            ->join('sort', function ($join) {
                $join->on('sort.id', '=', 'blog.sort_id');
            })
            ->select($field)
            ->orderby($orderby, $sort)
            ->paginate($paginate);
    }


}
