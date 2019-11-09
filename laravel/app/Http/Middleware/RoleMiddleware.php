<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
//        dd(auth()->user()->role);
        if(auth()->user()->role != $role){
            return redirect()->route('home');
        }

        return $next($request);
    }
}
