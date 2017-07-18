<?php

namespace App\Http\Middleware;

use Closure;

class IsLoginMiddleware
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
        $user =   session('session_user')? session('session_user'):'';
        if(empty($user)){
            return redirect('auth/ulogin/index');
        }

        return $next($request);
    }
}
