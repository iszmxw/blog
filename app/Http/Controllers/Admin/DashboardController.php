<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\LoginLog;
use App\Models\Twitter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DashboardController extends Controller
{
    public function index(Request $request): array
    {
        // 文章数量
        $blog_num = Blog::getCount();
        // 评论数量
        $comment_num = Comment::getCount();
        // 微语数量
        $twitter_num = Twitter::getCount();
        // 登录日志记录
        $login_log = LoginLog::getPaginate([], [], 10, 'id', 'DESC');
        // 系统信息
        $data = [
            'blog_num'    => $blog_num,
            'comment_num' => $comment_num,
            'twitter_num' => $twitter_num,
            'system'      => PHP_OS_FAMILY,
            'php'         => PHP_VERSION,
            'serve'       => $_SERVER ['SERVER_SOFTWARE'],
            'serve_name'  => $_SERVER['SERVER_NAME'],
            'version'     => "Laravel @ {" . app()::VERSION . "} ",
            'login_log'   => $login_log
        ];
        return ['code' => 200, 'message' => 'ok', 'data' => $data];
    }
}
