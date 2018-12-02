<?php

namespace App\Models;

class Options extends Defaults
{
    protected $table = 'options';
    protected $primaryKey = 'option_id';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];
}
