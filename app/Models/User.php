<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    //单条数据获取
    public static function getOne($where)
    {
        return self::where($where)->first();
    }
}
