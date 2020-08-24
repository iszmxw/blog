<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function article_list(Request $request)
    {
        $where     = [];
        $list = Blog::getPaginate($where, ['blog.id', 'blog.title', 'sort.name as category_name', 'blog.views', 'blog.created_at'], 15, 'blog.created_at', 'DESC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }
}
