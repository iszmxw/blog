<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Defaults extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    public $dateFormat = 'U';
    public $guarded = [];

    // 获取单字段数据
    public static function getValue($where = [], $field = "id")
    {
        $res = self::where($where)->value($field);
        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }
    }

    // 获取单组数据
    public static function getOne($where = [], $field = [])
    {
        // 默认获取全部字段
        if (empty($field)) {
            $field = "*";
        }
        $res = self::select($field)->where($where)->first();
        if (!empty($res)) {
            return $res->toArray();
        } else {
            return false;
        }
    }

    // 获取多条数据
    public static function getList($where = [], $field = [], $offset = 0, $limit = 0, $orderby = "id", $sort = 'DESC')
    {
        if (empty($field)) {
            $field = '*';
        }
        $model = self::select($field);
        if (!empty($where)) {
            $model = $model->where($where);
        }
        $model = $model->orderBy($orderby, $sort);
        if (!empty($offset)) {
            $model = $model->offset($offset);
        }
        if (!empty($limit)) {
            $model = $model->limit($limit);
        }
        $res = $model->get();

        if (!empty($res)) {
            return $res->toArray();
        } else {
            return false;
        }
    }

    // 获取分页数据
    public static function getPaginate($where = [], $field = [], $paginate = 1, $orderby = "id", $sort = "DESC")
    {
        if (empty($field)) {
            $field = '*';
        }
        $model = self::select($field);
        if (!empty($where)) {
            $model = $model->where($where);
        }
        $model = $model->orderBy($orderby, $sort);
        $res = $model->paginate($paginate);

        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }
    }

    // 添加数据
    public static function addData($data = [], $where = [])
    {
        if (!empty($where)) {
            $res = self::where($where)->first();
            if (empty($res)) {
                $res = self::create($data);
            }
        } else {
            $res = self::create($data);
        }

        if (!empty($res)) {
            return $res->toArray();
        } else {
            return false;
        }
    }

    // 编辑数据
    public static function editData($data = [], $where = [])
    {
        $res = self::where($where)->update($data);

        if (!empty($res)) {
            return self::getOne($where);
        } else {
            return false;
        }
    }

    // 删除数据
    public static function deleteData($where = [])
    {
        $res = self::where($where)->delete();
        if (!empty($res)) {
            return true;
        } else {
            return false;
        }
    }

    // 获取单列数据
    public static function getPluck($where = [], $field = "id")
    {
        $res = self::where($where)->pluck($field);
        if(!empty($res)){
            return $res->toArray();
        }else{
            return false;
        }
    }

    // 查询该数据是否存在
    public static function checkRowExists($where = [], $field = "id")
    {
        $res = self::where($where)->value($field);
        if (isset($res)) {
            return true;
        } else {
            return false;
        }
    }

    // 求总数
    public static function getCount($where = [], $field = "id")
    {
        $res = self::where($where)->count($field);
        return $res;
    }

    // 求和
    public static function getSum($where = [], $field = "id")
    {
        $res = self::where($where)->sum($field);
        return $res;
    }

    // 求最大值
    public static function getMax($where = [], $field = "id")
    {
        $res = self::where($where)->max($field);
        return $res;
    }

    // 求最小值
    public static function getMin($where = [], $field = "id")
    {
        $res = self::where($where)->min($field);
        return $res;
    }

    // 求平均值
    public static function getAvg($where = [], $field = "id")
    {
        $res = self::where($where)->avg($field);
        return $res;
    }
}