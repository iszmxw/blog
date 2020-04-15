<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Sort;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CategoryController extends Controller
{
    // 栏目列表
    public function category_list(Request $request)
    {
        $where = [];
        $list  = Sort::getPaginate($where, '', 100, 'sort', 'ASC');
        $sort  = Sort::getList([]);
        foreach ($list as $value) {
            $value['article_num'] = Blog::getCount(['sort_id' => $value['id']]);
        }
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }


    // 添加栏目
    public function category_add(Request $request)
    {

    }

    // 编辑栏目
    public function category_edit(Request $request)
    {

    }

    // 删除栏目
    public function category_delete(Request $request)
    {

    }
}
