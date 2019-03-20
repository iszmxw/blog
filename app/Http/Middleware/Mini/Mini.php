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
        dd(1);
        return $next($request);
    }
}
