<?php

namespace App\Http\Middleware;

use Closure;

class AfterLogin
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
        //print_r($request->session()->get('all'));die;
        /*if (!$request->session()->has('is_login')){
            return redirect()->guest('/');
        }*/


        if (!$request->session()->has('is_login')){
            if($request->ajax()){
                $return['key'] = 'ASE';
                $return['home_url'] = url('/');
                return $return;
            }
            return redirect()->guest('/');
        }

        return $next($request);
    }
}
