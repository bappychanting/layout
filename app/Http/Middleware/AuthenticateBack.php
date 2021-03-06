<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthenticateBack
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
        if(Auth::check()){
            abort(404);
        }
        elseif (Auth::guard('admin')->check()) {
            return $next($request);
        }
        return redirect()->route('back.login');
    }
}