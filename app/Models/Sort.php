<?php

namespace App\Models;

class Sort extends Defaults
{
    protected $table = 'sort';
    protected $primaryKey = 'sid';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];

    //修改数据
    public static function EditData($where,$data)
    {
        if($model = self::where($where)->first()){
            foreach($data as $key=>$val){
                $model->$key=$val;
            }
            $model->save();
        }
    }

    //删除数据
    public static function selected_delete($where)
    {
        return self::where($where)->delete();
    }
}
