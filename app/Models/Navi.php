<?php

namespace App\Models;
class Navi extends Defaults
{
    protected $table = 'navi';
    protected $primaryKey = 'id';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];

    //选择性获取数据
    public static function get_select($where,$select,$orderby,$sort="ASC")
    {
        return self::where($where)->select($select)->orderby($orderby,$sort)->get();
    }
}
