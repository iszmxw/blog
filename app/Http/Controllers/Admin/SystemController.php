<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class SystemController extends Controller
{
    // 获取网站系统配置
    public function config(Request $request)
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


    /**
     * 保存网站配置
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/6 23:14
     */
    public function save_config(Request $request)
    {

    }

    /**
     * 访客记录
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/6 23:15
     */
    public function view_log(Request $request)
    {

    }
}
