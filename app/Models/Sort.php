<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    protected $table = 'sort';
    protected $primaryKey = 'sid';
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

    //分页获取数据
    public static function getPaginate($where,$sort,$desc,$paginate)
    {
        return self::where($where)->orderby($sort,$desc)->paginate($paginate);
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
}
