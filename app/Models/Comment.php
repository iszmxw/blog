<?php

namespace App\Models;

class Comment extends Defaults
{
    protected $table = 'comment';
    protected $primaryKey = 'cid';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];
}
