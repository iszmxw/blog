<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    public function add(Request $request)
    {
        return view('admin.article_add');
    }
}
