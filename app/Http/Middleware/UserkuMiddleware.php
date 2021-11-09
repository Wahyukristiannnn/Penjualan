<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserkuMiddleware
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
        if(Auth::check() && Auth::User()->role=='admin'){
            return $next($request);
        }
        return redirect()->route('logout')->with('error',"You don't have an access");
    }
}
