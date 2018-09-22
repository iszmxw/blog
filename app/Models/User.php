<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'user';
    protected $primaryKey = 'uid';

    /**
     * 工厂方法
     */
    //单条数据获取
    public static function getOne($where)
    {
        return self::where($where)->first();
    }
}
