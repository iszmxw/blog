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
        $token = $request->all();
        $route = $request->path();
        switch ($route){
            case 'api/wx_mini/login':
                break;
            default :
                return self::CheckToken($token);
        }
        return $next($request);
    }

    public static function CheckToken($token)
    {
        if(empty($token)){
            return ['status'=>'0','msg'=>'token不能为空','data'=>[]];
        }
    }
}
