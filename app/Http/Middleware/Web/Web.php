<?php

namespace App\Http\Middleware\Web;

use App\Models\Navi;
use Closure;

class Web
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
        switch ($route){
            case '/';
                self::Navdata($request);
                break;
        }
        return $next($request);
    }

    public static function Navdata($request)
    {
        $nav = Navi::getList([]);
        $request->attributes->add(['nav'=>$nav]);
        dump($nav,$request);
    }
}
