<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class RedirectIfKasirAuthenticated
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
        //If request comes from logged in user, he will
        //be redirect to home page.
        if (Auth::guard()->check()) {
            return redirect('/home');
        }

        //If request comes from logged in seller, he will
        //be redirected to seller's home page.
        if (Auth::guard('web_kasir')->check()) {
            return redirect('/kasir_home');
        }
        
        return $next($request);
    }
}
