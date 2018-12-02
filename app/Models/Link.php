<?php

namespace App\Models;

class Link extends Defaults
{
    protected $table = 'link';
    protected $primaryKey = 'id';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];
}
