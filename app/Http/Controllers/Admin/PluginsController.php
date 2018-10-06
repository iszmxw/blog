<?php

namespace App\Http\Controllers\Admin;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PluginsController extends Controller
{
    public function tag_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Tag::getList([]);
        return view('admin.tag_list',['user_data'=>$user_data,'list'=>$list]);
    }
}
