<?php

namespace App\Models;

class Sort extends Defaults
{
    protected $table = 'sort';
    protected $primaryKey = 'sid';
    //设置时间戳字段
    public $timestamps = false;

    //删除数据
    public static function selected_delete($where)
    {
        return self::where($where)->delete();
    }
}
