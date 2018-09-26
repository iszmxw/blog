<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    protected $table = 'sort';
    protected $primaryKey = 'sid';
    //单条数据获取
    public static function getOne($where)
    {
        return self::where($where)->first();
    }
}
