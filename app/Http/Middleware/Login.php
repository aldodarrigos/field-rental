<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Login
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
        //return $next($request);
        /*
        if (auth()->check())
        return $next($request);
    
        return redirect('/login');
        */

        if (Auth::user()->role == 1)
        return redirect('/');
        

        return redirect('/profile/dashboard');


    }
}
