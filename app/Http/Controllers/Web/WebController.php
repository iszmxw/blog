<?php

namespace App\Http\Controllers\Web;

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
        $blog = Blog::getPaginate([], ['gid', 'sortid', 'title', 'date', 'content', 'views'], 10, 'date', 'DESC');
        foreach ($blog as $value) {
            $value['date'] = date('Y-m-d H:i:s', $value['date']);
            $value['content'] = Tooling::tool_purecontent($value['content'], 240);
            $value['sortname'] = Sort::getValue(['sid' => $value['sortid']], 'sortname');
            $value['comments'] = Comment::getCount(['gid' => $value['gid']]);
            //取第一张图片作为缩略图
            if ($value['thumb'] = Attachment::getOne([['blogid', $value['gid']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $view = ['blog' => $blog];
        return view('web.default_template.index', $view);
    }

    //栏目页面
    public function category($category_id)
    {
        $blog = Blog::getPaginate(['sortid' => $category_id], ['gid', 'sortid', 'title', 'date', 'content', 'views'], 10, 'date', 'DESC');
        foreach ($blog as $value) {
            $value['date'] = date('Y-m-d H:i:s', $value['date']);
            $value['content'] = Tooling::tool_purecontent($value['content'], 240);
            $value['sortname'] = Sort::getValue(['sid' => $value['sortid']], 'sortname');
            $value['comments'] = Comment::getCount(['gid' => $value['gid']]);
            //取第一张图片作为缩略图
            if ($value['thumb'] = Attachment::getOne([['blogid', $value['gid']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $view = ['blog' => $blog];
        return view('web.default_template.category', $view);
    }

    //文章页面
    public function article($article_id)
    {
        $blog = Blog::getOne(['gid' => $article_id]);
        $blog['date'] = date('Y-m-d H:i:s', $blog['date']);
        $blog['author'] = User::getValue(['uid' => $blog['author']], 'nickname');
        $blog['sortname'] = Sort::getValue(['sid' => $blog['sortid']], 'sortname');
        $blog['tags'] = Tag::getList([['gid', 'like', '%,' . $blog['gid'] . ',%']]);
        $comment = Comment::where(['gid' => $article_id])->get()->toArray();
        $blog['comment'] = Comment::where(['gid' => $article_id])->count();
        $data = ['blog' => $blog, 'comment' => $comment];
        return view('web.default_template.article', $data);
    }

    public function about()
    {
        return view('web.default_template.about');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 前台评论留言
     */
    public function comment_api(Request $request)
    {
        $user_data = $request->get('qq_data');
        $gid = $request->get('gid');
        $qq = $request->get('qq');
        $url = $request->get('url');
        $comment = $request->get('comment');
        $ip = $request->getClientIp();
        $data = [
            'gid' => $gid,
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
}
