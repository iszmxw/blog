<?php

namespace App\Models;

class Blog extends Defaults
{
    protected $table = 'blog';
    protected $primaryKey = 'gid';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];
}
