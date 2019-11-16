<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Defaults
{
    protected $table = 'options';
    protected $primaryKey = 'option_id';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];

    // 获取单字段数据
    public static function getValue($field_name, $value = 'option_value')
    {
        return self::where(['option_name' => $field_name])->value($value);
    }
}
