<?php

namespace App\Http\Controllers\Admin;

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
        dd($request);

        return response()->json(['data'=>'祝贺你添加成功了！','status'=>'1']);
    }
}
