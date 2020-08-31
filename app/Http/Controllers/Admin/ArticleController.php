<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    // 文章列表
    public function article_list(Request $request)
    {
        $where = [];
        $list  = Blog::getPaginate($where, ['blog.id', 'blog.title', 'sort.name as category_name', 'blog.views', 'blog.created_at'], 15, 'blog.created_at', 'DESC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }

    /**
     * 添加文章
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/8/31 23:05
     */
    public function article_add(Request $request)
    {
        $param = $request->all();
        if (empty($param['title'])) {
            return ['code' => 500, 'message' => '请输入文章标题'];
        }
        DB::beginTransaction();
        try {
            $data['title']   = $param['title'];
            $data['sort_id'] = $param['category_id'];
            $data['content'] = $param['content'];
            $data['excerpt'] = '';
            Blog::AddData($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '操作失败请稍后再试' . $e->getMessage()];
        }
        return ['code' => 200, 'message' => '操作成功'];
    }
}
