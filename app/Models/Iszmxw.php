<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Iszmxw extends Defaults
{
    use SoftDeletes;

    //设置时间戳字段
    public $timestamps = true;
    // 以时间戳的形式来维护
    public $dateFormat = 'Y-m-d H:i:s';
    //过滤黑名单字段
    public $guarded = [];

    protected $table = 'iszmxw';
    protected $primaryKey = 'id';


}
