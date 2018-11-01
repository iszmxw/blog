<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navi extends Model
{
    protected $table = 'navi';
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

    //选择性获取数据
    public static function get_select($where,$select,$orderby,$sort="ASC")
    {
        return self::where($where)->select($select)->orderby($orderby,$sort)->get();
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

    //删除数据
    public static function selected_delete($where)
    {
        return self::where($where)->delete();
    }
}
