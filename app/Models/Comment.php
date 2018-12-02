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
//    //单条数据获取
//    public static function getOne($where)
//    {
//        return self::where($where)->first();
//    }
//
//    //分页获取数据
//    public static function getPaginate($where,$sort,$desc,$paginate)
//    {
//        return self::where($where)->orderby($sort,$desc)->paginate($paginate);
//    }
//
//    //修改数据
//    public static function EditData($where,$data)
//    {
//        if($model = self::where($where)->first()){
//            foreach($data as $key=>$val){
//                $model->$key=$val;
//            }
//            $model->save();
//        }
//    }

    //删除数据
    public static function selected_delete($where)
    {
        return self::where($where)->delete();
    }

//    //取值
//    public static function getValue($where, $value)
//    {
//        return self::where($where)->value($value);
//    }
}
