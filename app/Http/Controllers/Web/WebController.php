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
            $content = $this->subString($content, 0, $strlen);
        }
        return $content;
    }
    /**
     * 截取编码为utf8的字符串
     *
     * @param string $strings 预处理字符串
     * @param int $start 开始处 eg:0
     * @param int $length 截取长度
     */
    function subString($strings, $start, $length) {
        if (function_exists('mb_substr') && function_exists('mb_strlen')) {
            $sub_str = mb_substr($strings, $start, $length, 'utf8');
            return mb_strlen($sub_str, 'utf8') < mb_strlen($strings, 'utf8') ? $sub_str . '...' : $sub_str;
        }
        $str = substr($strings, $start, $length);
        $char = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            if (ord($str[$i]) >= 128)
                $char++;
        }
        $str2 = substr($strings, $start, $length + 1);
        $str3 = substr($strings, $start, $length + 2);
        if ($char % 3 == 1) {
            if ($length <= strlen($strings)) {
                $str3 = $str3 .= '...';
            }
            return $str3;
        }
        if ($char % 3 == 2) {
            if ($length <= strlen($strings)) {
                $str2 = $str2 .= '...';
            }
            return $str2;
        }
        if ($char % 3 == 0) {
            if ($length <= strlen($strings)) {
                $str = $str .= '...';
            }
            return $str;
        }
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
