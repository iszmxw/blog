<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Sort;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    public function article_add(Request $request)
    {
        $user_data = $request->get('user_data');
        $sort = Sort::getList([]);
        return view('admin.article_add',['user_data'=>$user_data,'sort'=>$sort]);
    }

    public function article_add_check(Request $request)
    {
        $title = $request->get('title');
        $sortid = $request->get('sortid');
        $password = $request->get('password');
        $content = $request->get('content');
        if ($sortid == '-1'){
            return response()->json(['data'=>'请选择栏目分类！','status'=>'0']);
        }
        //数据库事物回滚
        $data['title'] = $title;
        $data['sortid'] = $sortid;
        $data['password'] = $password;
        $data['content'] = $content;
        Blog::creating($data);
//        DB::transaction(function() use ($data){
//
//        });
        return response()->json(['data'=>'祝贺你添加成功了！','status'=>'1']);
    }
}
