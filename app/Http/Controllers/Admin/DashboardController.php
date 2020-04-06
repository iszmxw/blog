<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $info = $request->get('info');
        // 文章数量

        // 评论数量

        // 微语数量

        // 系统信息

        // 登录日志记录
        $data = [];
        return ['code' => 200, 'message' => 'ok', 'data' => $data];
    }
}
