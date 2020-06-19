<?php

namespace App\Http\Controllers\Web;

use App\Library\Bomb;
use App\Library\Tooling;
use App\Models\Attachment;
use App\Models\Blog;
use App\Models\Link;
use App\Models\Sort;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\DifferenceHash;

class SiteController extends Controller
{
    // 首页控制器
    public function index()
    {
        $blog = Blog::getPaginate([], ['blog.id', 'blog.sort_id', 'blog.title', 'blog.created_at', 'blog.content', 'blog.views'], 10, 'created_at', 'DESC');
        foreach ($blog as $value) {
            $value['content']   = Tooling::tool_purecontent($value['content'], 240);
            $value['sort_name'] = Sort::getValue(['id' => $value['sort_id']], 'name');
            $value['comments']  = Comment::getCount(['id' => $value['id']]);
            //取第一张图片作为缩略图
            if ($value['thumb'] = Attachment::getOne([['blog_id', $value['id']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $view = ['blog' => $blog];
        return view('web.iszmxw_simple_pro.index', $view);
    }

    // 标签文章列表
    public function article_tag($tag_id)
    {
        $blog_id = Tag::getValue(['id' => $tag_id], 'blog_id');
        $blog    = [];
        if ($blog_id) {
            $blog_id = explode(',', $blog_id);
            $blog    = Blog::whereIn('blog.id', $blog_id)
                ->join('sort', function ($join) {
                    $join->on('sort.id', '=', 'blog.sort_id');
                })
                ->select(['blog.id', 'blog.sort_id', 'blog.title', 'blog.created_at', 'blog.content', 'blog.views'])
                ->orderby('created_at', 'DESC')
                ->paginate(10);
            foreach ($blog as $value) {
                $value['content']   = Tooling::tool_purecontent($value['content'], 240);
                $value['sort_name'] = Sort::getValue(['id' => $value['sort_id']], 'name');
                $value['comments']  = Comment::getCount(['id' => $value['id']]);
                //取第一张图片作为缩略图
                if ($value['thumb'] = Attachment::getOne([['blog_id', $value['id']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
                    $value['thumb'] = $value['thumb']['filepath'];
                }
            }
        }
        $view = ['blog' => $blog];
        return view('web.iszmxw_simple_pro.article_tag', $view);
    }

    /**
     * 归档
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/15 18:09
     */
    public function time(Request $request)
    {
        $blog = Blog::select(['blog.id', 'blog.title', 'blog.created_at'])
            ->orderby('created_at', 'DESC')
            ->paginate(10);
        $view = ['blog' => $blog];
        return view('web.iszmxw_simple_pro.time', $view);
    }

    /**
     * 分类
     * @param $category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/15 22:08
     */
    public function category()
    {
        $category = Sort::getList();
        foreach ($category as $key => $val) {
            $category[$key]['blog_num'] = Blog::getCount(['sort_id' => $val['id']]);
        }
        $view = ['category' => $category];
        return view('web.iszmxw_simple_pro.category', $view);
    }

    // 栏目分类文章列表
    public function category_article($category_id)
    {
        $blog = Blog::getPaginate(['sort_id' => $category_id], ['blog.id', 'blog.sort_id', 'blog.title', 'blog.created_at', 'blog.content', 'blog.views'], 10, 'created_at', 'DESC');
        foreach ($blog as $value) {
            $value['content']   = Tooling::tool_purecontent($value['content'], 240);
            $value['sort_name'] = Sort::getValue(['id' => $value['sort_id']], 'name');
            $value['comments']  = Comment::getCount(['id' => $value['id']]);
            //取第一张图片作为缩略图
            if ($value['thumb'] = Attachment::getOne([['blog_id', $value['id']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $view = ['blog' => $blog];
        return view('web.iszmxw_simple_pro.category_article', $view);
    }

    /**
     * 相册列表
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/15 22:14
     */
    public function photo_list()
    {
        $view = ['blog' => ''];
        return view('web.iszmxw_simple_pro.photo_list', $view);
    }

    /**
     * 朋友
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/15 22:19
     */
    public function link()
    {
        $link = Link::getList(['hide' => 'n'], [], '', '', 'taxis', 'ASC');
        $view = ['link' => $link];
        return view('web.iszmxw_simple_pro.link', $view);
    }

    /**
     * 文章页面
     * @param $article_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/16 21:57
     */
    public function article($article_id)
    {
        $blog               = Blog::getOne(['id' => $article_id]);
        $blog['created_at'] = date('Y-m-d H:i:s', $blog['created_at']);
        $blog['author']     = User::getValue(['id' => $blog['author']], 'nickname');
        $blog['name']       = Sort::getValue(['id' => $blog['sort_id']], 'name');
        $blog['tags']       = Tag::getList([['blog_id', 'like', '%,' . $blog['id'] . ',%']]);
        $comment_list       = Comment::where(['blog_id' => $article_id, 'pid' => 0])->get()->toArray();
        // 评论递归
        foreach ($comment_list as $key => $val) {
            $sub_comment_list = Comment::where(['blog_id' => $article_id, 'pid' => $val['id']])->get()->toArray();
            if (count($sub_comment_list) > 0) {
                $comment_list[$key]['sub_comment'] = $sub_comment_list;
            }
        }
        $blog['comment'] = Comment::where(['blog_id' => $article_id])->count();
        // 取第一张图片作为缩略图
        if ($thumb = Attachment::getOne([['blog_id', $blog['id']], ['mimetype', 'like', '%' . 'image/' . '%']])) {
            if (isset($thumb['thumb']['filepath'])) {
                $blog['thumb'] = $thumb['thumb']['filepath'];
            }
        }
        $data = ['blog' => $blog, 'comment_list' => $comment_list];
        return view('web.iszmxw_simple_pro.article', $data);
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
        $id        = $request->get('id');
        $qq        = $request->get('qq');
        $url       = $request->get('url');
        $comment   = $request->get('comment');
        $ip        = $request->getClientIp();
        $data      = [
            'id'      => $id,
            'pid'     => '0',
            'date'    => time(),
            'poster'  => $user_data['nickname'],
            'comment' => $comment,
            'mail'    => $qq . '@qq.com',
            'url'     => $url,
            'ip'      => $ip,
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


    /**
     *
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 17:33
     */
    public function images(Request $request)
    {
        $time1     = time();
        $hasher    = new ImageHash(new DifferenceHash());
        $hash3     = $hasher->hash('http://q1.qlogo.cn/g?b=qq&nk=543619552@qq.com&s=640');
        $hash4     = $hasher->hash('http://thirdqq.qlogo.cn/g?b=oidb&k=LoGg40Ia0d72iaLmevg0rog&s=640&t=1555902380');
        $distance1 = $hasher->distance($hash3, $hash4);
        echo "<br>";
        echo $hash3->toHex();
        echo "<br>";
        echo $hash4->toHex();
        echo "<br>";
        echo time() - $time1 . "====" . $distance1;
    }
}
