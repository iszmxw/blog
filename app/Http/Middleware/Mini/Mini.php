<?php

namespace App\Http\Middleware\Mini;

use Closure;
use Illuminate\Support\Facades\Redis;

class Mini
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->all();
        $route = $request->path();
        switch ($route) {
            case 'api/wx_mini/login':
                break;
            default :
                $re = self::CheckToken($data);

                return self::format_response($re, $next);

        }

        return $next($request);
    }

    public static function CheckToken($data)
    {
        if (empty($data['token'])) {
            return response()->json(['status' => '0', 'msg' => 'token不能为空', 'data' => []]);
        } else {
            $redis = Redis::connection('blog_web')->get($data['token']);
            if (empty($redis)) {
                return response()->json(['status' => '-100', 'msg' => '登录状态失效，请重新登录', 'data' => []]);
            }
        }
    }


    //switch中使用的返回方法
    public static function format_response($data, Closure $next)
    {
        if ($data['status'] == '0') {
            return response()->json($data);
        } else{
            return $next($data);
        }
    }
}
