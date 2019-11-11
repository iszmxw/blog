<?php

namespace App\Models;
class Navi extends Defaults
{
    protected $table = 'navi';
    protected $primaryKey = 'id';


    //选择性获取数据
    public static function get_select($where, $select, $orderby, $sort = "ASC")
    {
        return self::where($where)->select($select)->orderby($orderby, $sort)->get();
    }
}
