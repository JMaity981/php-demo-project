<?php

namespace App\Http\Middleware;

use Closure;

class BeforeLogin
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
        if ($request->session()->has('is_login'))
        {
           return redirect()->guest('lager');
        }
        return $next($request);
    }
}
