<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    /**
     * 登录接口
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/3/31 16:20
     */
    public function login(Request $request)
    {
        dd($request);
    }

    /**
     * 退出后台
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:20
     */
    public function quit()
    {
        session()->put('user_data', '');
        return redirect('admin_web/login');
    }
}
