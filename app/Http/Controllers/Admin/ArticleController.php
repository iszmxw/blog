<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Sort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $excerpt = $request->get('excerpt');//摘要
        $content = $request->get('content');
        if ($sortid == '-1')return response()->json(['data'=>'请选择栏目分类！','status'=>'0']);
        if (!$title)return response()->json(['data'=>'请输入文章标题！','status'=>'0']);
        //数据库事物回滚
        $data['title'] = $title;
        $data['sortid'] = $sortid;
        $data['password'] = $password?$password:'';
        $data['excerpt'] = $excerpt?$excerpt:'';
        $data['content'] = $content?$content:'';
        $data['date'] = time();
        DB::beginTransaction();
        try {
            Blog::AddData($data);
            DB::commit();
            return response()->json(['data'=>'祝贺你添加成功了！','status'=>'1']);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();//事件回滚
            return response()->json(['data' => '添加失败，请检查', 'status' => '0']);
        }

    }

    //文章列表
    public function article_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Blog::getPaginate([],10);
        dump($list);
        return view('admin.article_list',['user_data'=>$user_data,'list'=>$list]);
    }
}
