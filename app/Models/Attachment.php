<?php

namespace App\Models;

class Attachment extends Defaults
{
    protected $table = 'attachment';
    protected $primaryKey = 'aid';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];
}
