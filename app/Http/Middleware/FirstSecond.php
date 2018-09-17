<?php

namespace App\Http\Middleware;

use Closure;

class FirstSecond
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
        echo "This is the first one";
        return $next($request);
    }
}
