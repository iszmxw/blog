<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Tag;
use App\Models\Twitter;
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
    public function link_add(Request $request): array
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
    public function link_delete(Request $request): array
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
    public function link_edit(Request $request): array
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
    public function link_list(Request $request): array
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
    public function link_one(Request $request): array
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
    public function tag_list(Request $request): array
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
    public function tag_delete(Request $request): array
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
    public function comment_list(Request $request): array
    {
        $list = Comment::getPaginate([], '', 10, 'created_at', 'DESC');
        foreach ($list as $key => $value) {
            if (!$value['mail']) $value['mail'] = 10000;
            $list[$key]['blog_title'] = Blog::getValue(['id' => $value['blog_id']], 'title');
        }
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }


    /**
     * 删除评论
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-20 22:08
     */
    public function comment_delete(Request $request): array
    {
        $id  = $request->get('id');
        $res = Comment::selected_delete(['id' => $id]);
        if ($res) {
            return ['code' => 200, 'message' => '删除成功！'];
        } else {
            return ['code' => 500, 'message' => '操作失败'];
        }
    }

    /**
     * 修改评论显示、隐藏状态
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-20 22:20
     */
    public function comment_status(Request $request): array
    {
        $id   = $request->get('id');
        $hide = Comment::getValue(['id' => $id], 'hide');
        if ($hide == 1) {
            $hide = 0;
        } else {
            $hide = 1;
        }
        DB::beginTransaction();
        try {
            Comment::EditData(['id' => $id], ['hide' => $hide]);
            DB::commit();
            return ['code' => 200, 'message' => '操作成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '操作失败'];
        }
    }


    /**
     * 获取单条评论数据
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-21 22:43
     */
    public function comment_one(Request $request): array
    {
        $id   = $request->get('id');
        $data = Comment::getOne(['id' => $id]);
        return ['code' => 200, 'message' => 'ok', 'data' => $data];
    }


    /**
     * 回复评论
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-21 23:11
     */
    public function comment_reply(Request $request): array
    {
        $id                 = $request->get('id');
        $reply              = $request->get('reply');
        $poster             = Comment::getValue(['id' => $id], 'poster');
        $data['mail']       = "442246396@qq.com";
        $data['url']        = "http://blog.54zm.com/";
        $data['ip']         = $request->getClientIp();
        $data['blog_id']    = $request->get('blog_id');
        $data['pid']        = $id;
        $data['poster']     = '追梦小窝';
        $data['header_img'] = 'http://q1.qlogo.cn/g?b=qq&nk=442246396@qq.com&s=640';
        $data['comment']    = '@' . $poster . '：' . $reply;
        DB::beginTransaction();
        try {
            Comment::create($data);
            DB::commit();
            return ['code' => 200, 'message' => '回复成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '回复失败'];
        }
    }

    /**
     * 编辑评论
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-22 21:57
     */
    public function comment_edit(Request $request): array
    {
        $id      = $request->get('id');
        $poster  = $request->get('poster');
        $mail    = $request->get('mail');
        $url     = $request->get('url');
        $comment = $request->get('comment');
        $data    = [
            'poster'  => $poster,
            'mail'    => $mail,
            'url'     => $url,
            'comment' => $comment
        ];
        DB::beginTransaction();
        try {
            Comment::EditData(['id' => $id], $data);
            DB::commit();
            return ['code' => 200, 'message' => '编辑成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '编辑失败'];
        }
    }


    /**
     * 说说列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-22 22:15
     */
    public function twitter_list(Request $request): array
    {
        $data = Twitter::getPaginate([], '*', 10, 'id', 'DESC');
        return ['code' => 200, 'message' => 'ok', 'data' => $data];
    }

}
