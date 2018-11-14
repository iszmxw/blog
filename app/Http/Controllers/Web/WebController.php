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

class WebController extends Controller
{
    //首页
    public function index(Request $request)
    {
        $nav = $request->get('nav');
        $blog = Blog::getPaginate([],['gid','sortid','title','date','content','views'],'date','DESC',15);
        foreach($blog as $value){
            $value['date'] = date('Y-m-d H:i:s',$value['date']);
            $value['content'] = Tooling::tool_purecontent($value['content'],240);
            $value['sortname'] = Sort::getValue(['sid'=>$value['sortid']],'sortname');
            $value['comments'] = Comment::where(['gid'=>$value['gid']])->count();
            //取第一张图片作为缩略图
            if($value['thumb'] = Attachment::getOne([['blogid',$value['gid']],['mimetype','like','%'.'image/'.'%']])){
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $data = ['nav'=>$nav,'blog'=>$blog];
        return view('web.default_template.index',$data);
    }

    //栏目页面
    public function category(Request $request,$category_id)
    {
        $nav = $request->get('nav');
        $blog = Blog::getPaginate(['sortid'=>$category_id],['gid','sortid','title','date','content','views'],'date','DESC',15);
        foreach($blog as $value){
            $value['date'] = date('Y-m-d H:i:s',$value['date']);
            $value['content'] = Tooling::tool_purecontent($value['content'],240);
            $value['sortname'] = Sort::getValue(['sid'=>$value['sortid']],'sortname');
            $value['comments'] = Comment::where(['gid'=>$value['gid']])->count();
            //取第一张图片作为缩略图
            if($value['thumb'] = Attachment::getOne([['blogid',$value['gid']],['mimetype','like','%'.'image/'.'%']])){
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $data = ['nav'=>$nav,'blog'=>$blog];
        return view('web.default_template.category',$data);
    }

    //文章页面
    public function article(Request $request,$article_id)
    {
        $nav = $request->get('nav');
        $blog = Blog::getOne(['gid'=>$article_id]);
        $blog['date'] = date('Y-m-d H:i:s',$blog['date']);
        $blog['author'] = User::getValue(['uid'=>$blog['author']],'nickname');
        $blog['sortname'] = Sort::getValue(['sid'=>$blog['sortid']],'sortname');
        $blog['tags'] = Tag::getList([['gid','like','%,'.$blog['gid'].',%']]);
        $data = ['nav'=>$nav,'blog'=>$blog];
        return view('web.default_template.article',$data);
    }

    public function about()
    {
        return view('web.default_template.about');
    }
}
