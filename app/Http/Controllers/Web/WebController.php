<?php

namespace App\Http\Controllers\Web;

use App\Models\Blog;
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

    public function article(Request $request,$article_id)
    {
        $nav = $request->get('nav');
        $blog = Blog::getOne(['gid'=>$article_id]);
        $data = ['nav'=>$nav,'blog'=>$blog];
        dump($blog);
        return view('web.default_template.article',$data);
    }

    public function about()
    {
        return view('web.default_template.about');
    }
}
