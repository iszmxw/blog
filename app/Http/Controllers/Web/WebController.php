<?php

namespace App\Http\Controllers\Web;

use App\Library\Bomb;
use App\Library\Tooling;
use App\Models\Attachment;
use App\Models\Blog;
use App\Models\Sort;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    //首页控制器
    public function index()
    {
        $blog = Blog::getPaginate([], ['blog.id', 'blog.sort_id', 'blog.title', 'blog.created_at', 'blog.content', 'blog.views'], 10, 'created_at', 'DESC');
        foreach ($blog as $value) {
            $value['content'] = Tooling::tool_purecontent($value['content'], 240);
            $value['sort_name'] = Sort::getValue(['id' => $value['sort_id']], 'name');
            $value['comments'] = Comment::getCount(['id' => $value['id']]);
            //取第一张图片作为缩略图
            if ($value['thumb'] = Attachment::getOne([['blog_id', $value['id']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $view = ['blog' => $blog];
        return view('web.default_template.index', $view);
    }

    //栏目页面
    public function category($category_id)
    {
        $blog = Blog::getPaginate(['sort_id' => $category_id], ['blog.id', 'blog.sort_id', 'blog.title', 'blog.created_at', 'blog.content', 'blog.views'], 10, 'blog.created_at', 'DESC');
        foreach ($blog as $value) {
            $value['content'] = Tooling::tool_purecontent($value['content'], 240);
            $value['name'] = Sort::getValue(['id' => $value['sort_id']], 'name');
            $value['comments'] = Comment::getCount(['id' => $value['id']]);
            //取第一张图片作为缩略图
            if ($value['thumb'] = Attachment::getOne([['blog_id', $value['id']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $view = ['blog' => $blog];
        return view('web.default_template.category', $view);
    }

    //文章页面
    public function article($article_id)
    {
        $blog = Blog::getOne(['id' => $article_id]);
        $blog['created_at'] = date('Y-m-d H:i:s', $blog['created_at']);
        $blog['author'] = User::getValue(['id' => $blog['author']], 'nickname');
        $blog['name'] = Sort::getValue(['id' => $blog['sort_id']], 'name');
        $blog['tags'] = Tag::getList([['blog_id', 'like', '%,' . $blog['id'] . ',%']]);
        $comment = Comment::where(['id' => $article_id])->get()->toArray();
        $blog['comment'] = Comment::where(['id' => $article_id])->count();
        $data = ['blog' => $blog, 'comment' => $comment];
        return view('web.default_template.article', $data);
    }

    public function about()
    {
        return view('web.default_template.about');
    }


    /**
     * 前台评论留言
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function comment_api(Request $request)
    {
        $user_data = $request->get('qq_data');
        $id = $request->get('id');
        $qq = $request->get('qq');
        $url = $request->get('url');
        $comment = $request->get('comment');
        $ip = $request->getClientIp();
        $data = [
            'id' => $id,
            'pid' => '0',
            'date' => time(),
            'poster' => $user_data['nickname'],
            'comment' => $comment,
            'mail' => $qq . '@qq.com',
            'url' => $url,
            'ip' => $ip,
        ];
        //数据库事物回滚
        DB::beginTransaction();
        try {
            Comment::create($data);
            DB::commit();
            return response()->json(['data' => '发表评论成功！', 'status' => '1']);
        } catch (\Exception $e) {
            DB::rollBack();//事件回滚
            return response()->json(['data' => '发表失败，请稍后再试！', 'status' => '-1']);
        }
    }


    public function bomb(Request $request)
    {
        $mobile = $request->get('mobile');
        if (empty($mobile))
            return ['error' => 50001, 'message' => '缺少手机号码'];
        $res = Bomb::bomb($mobile);
        return $res;
    }
}
