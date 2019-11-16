<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Defaults
{
    use SoftDeletes;

    //设置时间戳字段
    public $timestamps = true;
    // 以时间戳的形式来维护
    public $dateFormat = 'U';
    //过滤黑名单字段
    public $guarded = [];

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
