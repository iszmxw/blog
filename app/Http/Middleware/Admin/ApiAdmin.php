<?php

namespace App\Http\Middleware\Admin;

use App\Library\Tools;
use App\Models\Role;
use App\Models\RoleRoute;
use Closure;
use Illuminate\Support\Facades\Cache;

class ApiAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route     = $request->path();
        $arr_route = explode('/', $route);
        switch ($route) {
            case 'api/admin/sms';
            case 'api/admin/login';
            case 'api/admin/advert/image_upload';
            case 'api/admin/collection/' . end($arr_route);
                return $next($request);
                break;
            default;
                $res = self::LoginCheck($request);
                return self::Response($res, $next);
                break;
        }
    }


    // 登录状态监测
    public static function LoginCheck($request)
    {
        // 从头部获取token
        $Xtoken = $request->header('Admin-Token');
        // 从头部获取代理用户信息
        $user_id = $request->header('User-Id');
        // 接收第一次传过来的token
        $token = $request->get('token');
        // token最终结果
        $token = empty($token) ? $Xtoken : $token;
        $info  = Cache::get($token);
        if ($info) {
            $expire = time() - $info['refresh_time'];
            // 半个小时后用户还在操作，延长用户的登录时间
            if ($expire > 1800) {
                $info['refresh_time'] = time();
                Cache::put($token, $info, 3600);
            }
            // 如果是代理登录，查看当前用户是否为超级管理员，只有超级管理员才能代理登录
            if (is_numeric($user_id) && $user_id > 1 && $info['id'] == 1) {
                $response = Tools::agent_login($token, $user_id);
                if ($response['code'] === 500) {
                    return self::ReArray(0, ['code' => 508, 'message' => $response['message']]);
                }
                $info['id']             = $response['data']['id'];
                $info['account']        = $response['data']['account'];
                $info['password']       = $response['data']['password'];
                $info['roles']          = $response['data']['roles'];
                $info['role_id']        = $response['data']['role_id'];
                $info['mobile']         = $response['data']['mobile'];
                $info['login_time']     = $response['data']['login_time'];
                $info['refresh_time']   = $response['data']['refresh_time'];
                $info['is_agent_login'] = 1;
            }
            // 将登录后的用户信息添加到request中
            $request->attributes->add(['info' => $info]);
            return self::ReArray(1, $request);
        } else {
            return self::ReArray(0, ['code' => 508, 'message' => '登录过期，无法获取用户详细信息。请您退出后重新登录']);
        }
    }

    // 检测用户的登录和角色权限
    public static function LoginAndRoleCheck($request)
    {
        $res = self::LoginCheck($request);
        if ($res['status'] == 1) {
            // 如果登录成功检测用户的权限
            return self::RoleCheck($request);
        } else {
            return $res;
        }
    }


    // 用户角色权限检测
    public static function RoleCheck($request)
    {
        $route = $request->path();
        // 从头部获取token
        $Xtoken = $request->header('Admin-Token');
        // 接收第一次传过来的token
        $token = $request->get('token');
        // token最终结果
        $token = empty($token) ? $Xtoken : $token;
        $info  = Cache::get($token);
        // 查找用户可访问路由
        if (empty($info['allow_routes'])) {
            $allow_routes = [];
            $role_id      = $info['role_id'];
            $routes       = Role::getValue(['id' => $role_id], 'routes');
            $routes       = explode(',', $routes);
            $routes       = RoleRoute::where('route', '<>', null)->whereIn('id', $routes)->get(['route'])->toArray();
            foreach ($routes as $key => $val) {
                $allow_routes[] = $val['route'];
            }
            $public_route = config('route.admin');
            // 计算出用户所有允许访问的路由
            $allow_routes = array_merge($allow_routes, $public_route);
            // 缓存角色可访问路由
            $info['allow_routes'] = $allow_routes;
            // 更新登录信息，同时缓存从新开始，1小时后失效
            Cache::put($token, $info, 3600);
        } else {
            $allow_routes = $info['allow_routes'];
        }
        // 判断角色是否具备当前请求的路由
        if ($info['id'] != 1 && !in_array($route, $allow_routes)) {
            // 默认所有用户具备权限
//            return self::ReArray(1, $request);
            return self::ReArray(0, ['code' => 500, 'message' => '抱歉！您不具备权限！']);
        } else {
            return self::ReArray(1, $request);
        }
    }

    // 登录状态监测
    public static function Response($res, Closure $next)
    {
        if ($res['status'] == 1) {
            return $next($res['response']);
        } else {
            return response()->json($res['response']);
        }
    }

    // 中间件返回数据专用
    public static function ReArray($status, $response)
    {
        $arr = [
            'status'   => $status,
            'response' => $response
        ];
        return $arr;
    }
}
