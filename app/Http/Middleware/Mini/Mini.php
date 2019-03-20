<?php

namespace App\Http\Middleware\Mini;

use Closure;
use Illuminate\Http\Request;
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
        $route = $request->path();
        switch ($route) {
            case 'api/wx_mini/login':
                break;
            default :
                $re = self::CheckToken($request);
                return self::format_response($re, $next);
        }
        return $next($request);
    }

    /**
     * 检测token是否存在，以及是否过期
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public static function CheckToken(Request $request)
    {
        $data = $request->all();
        if (empty($data['token'])) {
            return response()->json(['status' => '0', 'msg' => 'token不能为空', 'data' => []]);
        } else {
            $redis = Redis::connection('blog_web')->get($data['token']);
            if (empty($redis)) {
                $response = ['msg' => '登录状态失效，请重新登录', 'data' => []];
                return ['status' => '-100', 'response'=>$response];
            }else{
                return ['status' => '1', 'response'=>$request];
            }
        }
    }


    /**
     * 格式化返回数据
     * @param $data
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function format_response($data, Closure $next)
    {
        if ($data['status'] == '0') {
            return response()->json($data);
        } else{
            return $next($data['response']);
        }
    }
}
