<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServeController extends Controller
{
    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-14 22:47
     */
    public function link_add(Request $request)
    {
        $data = $request->all();
        if (empty($data['sitename'])) {
            return ['code' => 500, 'message' => '友链标题不能为空！'];
        }
        if (empty($data['hide'])) {
            return ['code' => 500, 'message' => '请设置是否隐藏此友链！'];
        }
        if (empty($data['siteurl'])) {
            return ['code' => 500, 'message' => '网站地址不能为空！'];
        }
        if (filter_var($data['siteurl'], FILTER_VALIDATE_URL) == false) {
            return ['code' => 500, 'message' => '网站地址格式不正确！'];
        }
        if (isset($data['order']) && !is_numeric($data['order'])) {
            return ['code' => 500, 'message' => '排序格式不正确，应该为数字！'];
        }
        // 添加事物包裹进行添加数据
        DB::beginTransaction();
        try {
            Link::AddData($data);
            DB::commit();
            return ['code' => 200, 'message' => '添加成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '添加失败，请稍后再试！'];
        }
    }

    /**
     * 删除
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:41
     */
    public function link_delete(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            Link::selected_delete($data);
            Db::commit();
            return ['code' => 200, 'message' => '删除成功！'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['code' => 500, 'message' => '删除失败，请稍后再试！'];
        }
    }


    /**
     * 编辑友链
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-17 23:11
     */
    public function link_edit(Request $request)
    {
        $data = $request->all();
        if (empty($data['sitename'])) {
            return ['code' => 500, 'message' => '友链标题不能为空！'];
        }
        if (empty($data['hide'])) {
            return ['code' => 500, 'message' => '请设置是否隐藏此友链！'];
        }
        if (empty($data['siteurl'])) {
            return ['code' => 500, 'message' => '网站地址不能为空！'];
        }
        if (filter_var($data['siteurl'], FILTER_VALIDATE_URL) == false) {
            return ['code' => 500, 'message' => '网站地址格式不正确！'];
        }
        if (isset($data['order']) && !is_numeric($data['order'])) {
            return ['code' => 500, 'message' => '排序格式不正确，应该为数字！'];
        }
        unset($data['updated_at']);
        DB::beginTransaction();
        try {
            $where = ['id' => $data['id']];
            Link::EditData($where, $data);
            DB::commit();
            return ['code' => 200, 'message' => '编辑成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '编辑失败，请稍后再试！'];
        }
    }

    /**
     * 列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:19
     */
    public function link_list(Request $request)
    {
        $list = Link::getPaginate([], '', 100, 'order', 'ASC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }


    /**
     * 单条数据
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-17 22:55
     */
    public function link_one(Request $request)
    {
        $id = $request->get('id');
        if (!empty($id) && $id > 0) {
            $data = Link::getOne(['id' => $id]);
            return ['code' => 200, 'message' => 'ok', 'data' => $data];
        } else {
            return ['code' => 500, 'message' => '数据异常'];
        }
    }


    /**
     * 标签列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-20 14:34
     */
    public function tag_list(Request $request)
    {
        $list = Tag::getList([], '*', 0, 0, 'id', 'DESC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }


    /**
     * 删除标签
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-20 15:26
     */
    public function tag_delete(Request $request)
    {
        $params = $request->all();
        if (empty($params['id'])) {
            return ['code' => 500, 'message' => '数据传输错误，请选择要删除的标签id'];
        }
        $res = Tag::selected_delete(['id' => $params['id']]);
        if ($res) {
            return ['code' => 200, 'message' => '删除成功！'];
        } else {
            return ['code' => 500, 'message' => '操作失败'];
        }
    }


    /**
     * 评论列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-20 17:32
     */
    public function comment_list(Request $request)
    {
        $list = Comment::getPaginate([], '', 10, 'created_at', 'DESC');
        foreach ($list as $key => $value) {
            if (!$value['mail']) $value['mail'] = 10000;
            $list[$key]['blog_title'] = Blog::getValue(['id' => $value['blog_id']], 'title');
        }
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }

}
