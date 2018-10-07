<?php

namespace App\Http\Controllers\Admin;
use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //栏目分类列表
    public function category_list(Request $request)
    {
        return view('admin.category_list');
    }

    //首页导航栏列表
    public function navbar_list(Request $request)
    {
        return view('admin.navbar_list');
    }
}
