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
        $blog = Blog::getPaginate([],['title','date','content','views'],'date','DESC',10)->toArray();
        foreach($blog as $value){
            dump($value);
//            $value['date'] = date('Y-m-d H:i:s',$value['date']);
//            $value['content'] = substr($value['content'],0,200);
        }
        $data = ['nav'=>$nav,'blog'=>$blog];
//        dump($data);
        return view('web.default_template.index',$data);
    }

    public function about()
    {
        return view('web.default_template.about');
    }
}
