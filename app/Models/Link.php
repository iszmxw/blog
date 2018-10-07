<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'link';
    protected $primaryKey = 'id';
    //设置时间戳字段
    public $timestamps = false;
    //过滤黑名单字段
    public $guarded = [];
    //单条数据获取
    public static function getOne($where)
    {
        return self::where($where)->first();
    }

    //获取列表数据
    public static function getList($where)
    {
        return self::where($where)->get();
    }
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
