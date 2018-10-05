<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'gid';
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

    //添加数据
    public static function AddData($data)
    {
        return self::create($data);
    }

    //分页获取数据
    public static function getPaginate($where,$select,$sort,$desc,$paginate)
    {
        return self::where($where)
            ->join('sort',function($join){
                        $join->on('sort.sid','=','blog.sortid');
                    })
            ->select($select)
            ->orderby($sort,$desc)
            ->paginate($paginate);
    }
}
