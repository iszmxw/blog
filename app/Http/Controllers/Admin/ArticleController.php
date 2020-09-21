<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
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


    /**
     * 删除文章
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/9/21 21:13
     */
    public function article_delete(Request $request)
    {
        $article_id = $request->get('article_id');
        DB::beginTransaction();
        try {
            $where = ['id' => $article_id];
            Blog::selected_delete($where);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '操作失败，请稍后再试！' . $e->getMessage()];
        }
        return ['code' => 200, 'message' => '操作成功！'];
    }

    /**
     * 编辑文章
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/8/31 23:05
     */
    public function article_edit(Request $request)
    {
        $param = $request->all();
        if (empty($param['title'])) {
            return ['code' => 500, 'message' => '请输入文章标题'];
        }
        if (empty($param['id'])) {
            return ['code' => 500, 'message' => '数据传输错误，请您检查后再试！'];
        }
        $where = ['id' => $param['id']];
        DB::beginTransaction();
        try {
            $data['title']   = $param['title'];
            $data['sort_id'] = $param['sort_id'];
            $data['content'] = $param['content'];
            $data['excerpt'] = '';
            // TODO 文章状态，status,0-发布为草稿状态，1-正式发布
//            $data['status'] = $param['status'];;
            Blog::EditData($where, $data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '操作失败请稍后再试' . $e->getMessage()];
        }
        return ['code' => 200, 'message' => '操作成功'];
    }


    /**
     * 获取博客文章列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/9/21 21:28
     */
    public function article_list(Request $request)
    {
        $where = [];
        $list  = Blog::getPaginate($where, ['blog.id', 'blog.title', 'sort.name as category_name', 'blog.views', 'blog.created_at'], 15, 'blog.created_at', 'DESC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }

    /**
     * 获取单条博客数据
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/9/21 21:28
     */
    public function article_one(Request $request)
    {
        $article_id = $request->get('article_id');
        $where      = ['id' => $article_id];
        $data       = Blog::getOne($where);
        return ['code' => 200, 'message' => 'ok', 'data' => $data];
    }
}
