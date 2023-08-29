<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class ViewLog extends Defaults
{
    use SoftDeletes;

    //设置时间戳字段
    public $timestamps = true;
    // 以时间戳的形式来维护
    public $dateFormat = 'U';
    //过滤黑名单字段
    public $guarded = [];

    protected $table = 'view_log';
    protected $primaryKey = 'id';

    /**
     * 格式化返回时间戳
     * @param $time
     * @return false|string
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/13 20:56
     */
    public function getCreatedAtAttribute($time)
    {
        return date('Y-m-d H:i:s', ((int)$time));
    }

    /**
     * 格式化返回时间戳
     * @param $time
     * @return false|string
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/13 20:56
     */
    public function getUpdatedAtAttribute($time)
    {
        return date('Y-m-d H:i:s', (int)$time);
    }

}