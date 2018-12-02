<?php

namespace App\Models;


class Tag extends Defaults
{
    protected $table = 'tag';
    protected $primaryKey = 'tid';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];
}
