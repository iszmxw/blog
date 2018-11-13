<?php

namespace App\Http\Controllers\Web;

use App\Models\Attachment;
use App\Models\Blog;
use App\Models\Sort;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //格式化内容工具
    function tool_purecontent($content, $strlen = null){
        $content = str_replace('继续阅读&gt;&gt;', '', $content);
        $content = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '|*********此处内容回复可见*********|', strip_tags($content));
        if ($strlen) {
            $content = subString($content, 0, $strlen);
        }
        return $content;
    }
    //首页
    public function index(Request $request)
    {
        $nav = $request->get('nav');
        $blog = Blog::getPaginate([],['gid','sortid','title','date','content','views'],'date','DESC',15);
        foreach($blog as $value){
            $value['date'] = date('Y-m-d H:i:s',$value['date']);
            $value['content'] = $this->tool_purecontent($value['content'],180);
            $value['sortname'] = Sort::getValue(['sid'=>$value['sortid']],'sortname');
            //取第一张图片作为缩略图
            if($value['thumb'] = Attachment::getOne([['blogid',$value['gid']],['mimetype','like','%'.'image/'.'%']])){
                $value['thumb'] = $value['thumb']['filepath'];
            }
        }
        $data = ['nav'=>$nav,'blog'=>$blog];
        $data['user_data'] = User::getOne(['uid'=>'1']);
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
        $blog['tags'] = Tag::getList([['gid','like','%,'.$blog['gid'].',%']]);
        $data = ['nav'=>$nav,'blog'=>$blog];
        return view('web.default_template.article',$data);
    }

    public function about()
    {
        return view('web.default_template.about');
    }
}
