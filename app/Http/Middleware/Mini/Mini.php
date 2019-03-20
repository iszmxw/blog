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
                break;
            default :
                $request = self::CheckToken($data,$next);
        }
        return $next($request);
    }

    public static function CheckToken($data,$next)
    {
        if(empty($data['token'])){
            return self::response(['status'=>'0','msg'=>'token不能为空','data'=>[]],$next);
        }
    }




    public static function response($request, Closure $next)
    {
        return $next($request);
    }
}
