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
            case 'api/wx_mini/index':
                break;
            default :
                $request = self::CheckToken($data);
                return $request;
        }
        return $next($request);
    }

    public static function CheckToken($data)
    {
        if(empty($data['token'])){
            return ['status'=>'0','msg'=>'token不能为空','data'=>[]];
        }
    }




    public static function response($request, Closure $next)
    {
        return $next($request);
    }
}
