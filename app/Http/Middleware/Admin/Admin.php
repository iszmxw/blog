<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\View;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = $request->getPathInfo();
        //公共检测方法，检测是否登录以及具有权限
        $re = self::CheckIsLoginAndHasRole($request);
        if ($re['status'] == '0') {
            return $re['data'];
        } else {
            switch ($route){//检测特殊路由
                case '/admin/login';
                dump($re);
                dump($request);
                    $data = $request->session()->get('user_data');
                    if ($data){//检测是否已经登录，已经登录就跳转
                        return redirect('admin');
                    }
                    break;
                case '/admin/quit';
                    break;
            }
        }
        //数据成功通过中间件，接下来传递到控制器
        return $next($re['data']);
    }

    //检测是否登录
    public static function CheckIsLogin($request)
    {
        $data = $request->session()->get('user_data');
        if ($data){
            $data['photo'] = str_replace('../','/',$data['photo']);
            $request->attributes->add(['user_data'=>$data]);
            View::share('user_data', $data);
            return self::RtData(1,$request);
        }else{
            if ($request->isMethod('post')) {
                return self::RtJson(0,'登录状态失效!');
            } elseif ($request->isMethod('get')) {
                return self::RtData(0,redirect('admin/login'));
            }
        }
    }

    //检测登录和权限
    public static function CheckIsLoginAndHasRole($request)
    {
        $re = self::CheckIsLogin($request);
        if ($re['status'] == '0'){
            return $re;
        }else{
            //权限暂时不做拦截
            return $re;
        }
    }

    //返回结果
    public static function RtData($status,$data)
    {
        return ['status'=>$status,'data'=>$data];
    }


    //返回Json数据
    public static function RtJson($status,$data)
    {
        return response()->json(['status'=>$status,'data'=>$data]);
    }

    //格式化返回值
    public static function format_response($re, Closure $next)
    {
        if ($re['status'] == '0') {
            return $re['data'];
        } else {
            return $next($re['data']);
        }
    }
}
