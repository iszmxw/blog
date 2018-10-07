<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\Link;
use App\Models\Sort;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //栏目分类列表
    public function category_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Sort::getPaginate([],'taxis','ASC',10);
        foreach ($list as $value){
            $value['blogs'] = Blog::where(['sortid'=>$value['sid']])->count();
        }
        return view('admin.category_list',['user_data'=>$user_data,'list'=>$list]);
    }

    //首页导航栏列表
    public function navbar_list(Request $request)
    {
        $user_data = $request->get('user_data');
        return view('admin.navbar_list',['user_data'=>$user_data]);
    }
}
