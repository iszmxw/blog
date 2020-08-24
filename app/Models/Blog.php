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

    /**
     * 格式化返回时间戳
     * @param $time
     * @return false|string
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/8/24 22:30
     */
    public function getCreatedAtAttribute($time)
    {
        return date('Y-m-d H:i:s', $time);
    }

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
