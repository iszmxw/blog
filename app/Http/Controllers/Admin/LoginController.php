<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Ramsey\Uuid\Uuid;

class LoginController extends Controller
{
    /**
     * 登录接口
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/3/31 16:56
     */
    public function login(Request $request)
    {
        // 用户ip
//        $ip       = $request->getClientIp();
//        $address  = IpAddress::address($ip);
        $username = $request->get('username');
        $password = $request->get('password');
        if (empty($username))
            return ['code' => 500, 'message' => '请输入登录账号！'];
        $user = User::getOne(['username' => $username]);
        if (empty($user)) {
            return ['code' => 500, 'message' => '登录账号不正确，请您确认后再试！'];
        }
        if ($user['ischeck'] == 'n')
            return ['code' => 500, 'message' => '对不起您的账户已经被冻结，如有疑问请联系相关工作人员！'];
        // 密码输入正确，登录成功
        if (decrypt($user['password']) == $password) {
            $token = Uuid::uuid1()->toString();
            // 生成登录用户的信息
            $info = [
                'id'           => $user['id'],
                'token'        => $token,
                'username'     => $user['username'],
                'nickname'     => $user['nickname'],
                'roles'        => $user['role'],
                'email'        => $user['email'],
                'login_time'   => time(),
                'refresh_time' => time()
            ];
            DB::beginTransaction();
            try {
                Cache::add($token, $info, 3600);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return ['code' => 500, 'data' => [], 'message' => '登录失败请刷新后再试！'];
            }
            return ['code' => 200, 'data' => ['token' => $token]];
        } else {
            return ['code' => 500, 'data' => [], 'message' => '账号密码不正确！'];
        }
    }

    /**
     * 获取用户信息
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/3/31 16:56
     */
    public function info(Request $request)
    {
        $info = $request->get('info');
        $data = User::getOne(['id' => $info['id']]);
        unset($data['password']);
        return ['code' => 200, 'message' => 'ok', 'data' => $data];
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
