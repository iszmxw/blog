<?php

namespace App\Http\Controllers\Web;

use App\Models\Blog;
use App\Models\Sort;
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
        $blog = Blog::getPaginate([],['title','date','content','views'],'date','DESC',10);
        foreach($blog as $value){
            $value['date'] = date('Y-m-d H:i:s',$value['date']);
            $value['content'] = substr($value['content'],0,200);
        }
        $data = ['nav'=>$nav,'blog'=>$blog];
        return view('web.default_template.index',$data);
    }

    //文章页面
    public function article(Request $request,$article_id)
    {
        $nav = $request->get('nav');
        $blog = Blog::getOne(['gid'=>$article_id]);
        $blog['date'] = date('Y-m-d H:i:s',$blog['date']);
        $blog['author'] = User::getValue(['uid'=>$blog['author']],'nickname');
        $blog['sortname'] = Sort::getValue(['sid'=>$blog['sortid']],'sortname');
        $where = '"gid","like","%".",{$blog[\'gid\']}"."%"';
        dump($where);
        $blog['tags'] = Tag::getList(`gid`,`like`,`%`.$blog['gid'].`%`);
        dump($blog['tags']);
        $data = ['nav'=>$nav,'blog'=>$blog];
        return view('web.default_template.article',$data);
    }

    public function about()
    {
        return view('web.default_template.about');
    }
}
