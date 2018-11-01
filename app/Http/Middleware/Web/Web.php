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
        //获取路由中的参数，文章id
        $article_id = $request->route('article_id');
        $route = $request->getPathInfo();
        switch ($route){
            case '/';
            case '/article/1000'.$article_id;
                self::Navdata($request);
                break;
        }
        return $next($request);
    }


    public static function Navdata($request)
    {
        $nav = Navi::get_select(['hide'=>'n'],['naviname','url','newtab'],'taxis','ASC')->toArray();
        $request->attributes->add(['nav'=>$nav]);
        return $request;
    }
}
