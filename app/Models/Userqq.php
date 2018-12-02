<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Userqq extends Defaults
{
    use SoftDeletes;
    public $timestamps = true;
    public $dateFormat = 'U';
    public $guarded = [];
    protected $table = 'user_qq';
    protected $primaryKey = 'id';
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

    //删除数据
    public static function selected_delete($where)
    {
        return self::where($where)->delete();
    }

    //取值
    public static function getValue($where, $value)
    {
        return self::where($where)->value($value);
    }
}
