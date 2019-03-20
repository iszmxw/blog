<?php

namespace App\Http\Middleware\Mini;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
            case 'api/wx_mini/quit':
            case 'api/wx_mini/getwxacode':
            case 'api/wx_mini/createwxaqrcode':
            case 'api/wx_mini/message_push':
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
            return self::format_data('-100',[],'token不能为空');
        } else {
            $token = Cache::get($data['token']);
            if (empty($token)) {
                $response = ['msg' => '登录状态失效，请重新登录', 'data' => []];
                return self::format_data('-100',$response);
            }else{
                return self::format_data('1',$request);
            }
        }
    }


    /**
     * 格式化工厂
     * @param $data
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function format_response($data, Closure $next)
    {
        if ($data['status'] == '1') {
            return $next($data['data']);
        } else {
            return response()->json($data);
        }
    }


    /**
     * 封装格式化返回数据格式
     * @param $status
     * @param array $data
     * @param string $msg
     * @return array
     */
    public static function format_data($status,$data = [],$msg = '')
    {
        return ['status' => $status, 'msg' => $msg, 'data' => $data];
    }
}
