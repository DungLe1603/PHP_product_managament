<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogout
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
        if (Auth::guest()) {
            # code...
            return redirect()->route('login');
        }
        return $next($request);
    }
}
