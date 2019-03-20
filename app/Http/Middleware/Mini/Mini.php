<?php

namespace App\Http\Middleware\Mini;

use Closure;

class Mini
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
        $data = $request->all();
        $route = $request->path();
        switch ($route){
            case 'api/wx_mini/login':
//            case 'api/wx_mini/index':
                break;
            default :
                return self::CheckToken($data);
        }
        return $next($request);
    }

    public static function CheckToken($data)
    {
        if(empty($data['token'])){
            return response()->json(['status'=>'0','msg'=>'token不能为空','data'=>[]]);
        }
    }
}
