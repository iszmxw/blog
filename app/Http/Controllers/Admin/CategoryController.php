<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //栏目分类列表
    public function category_list(Request $request)
    {
        $user_data = $request->get('user_data');
        return view('admin.category_list',['user_data'=>$user_data]);
    }

    //首页导航栏列表
    public function navbar_list(Request $request)
    {
        $user_data = $request->get('user_data');
        return view('admin.navbar_list',['user_data'=>$user_data]);
    }
}
