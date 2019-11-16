<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Navi extends Defaults
{
    use SoftDeletes;

    //设置时间戳字段
    public $timestamps = true;
    // 以时间戳的形式来维护
    public $dateFormat = 'U';
    //过滤黑名单字段
    public $guarded = [];

    protected $table = 'navi';
    protected $primaryKey = 'id';


    //选择性获取数据
    public static function get_select($where, $select, $orderby, $sort = "ASC")
    {
        return self::where($where)->select($select)->orderby($orderby, $sort)->get();
    }
}
