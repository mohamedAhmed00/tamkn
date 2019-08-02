<?php

namespace App\Modules\Credential\Middleware;

use Closure;

class RedirectIfAuth
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
        if(auth()->user())
        {
            return redirect('/auth/home');
        }
        return $next($request);
    }
}
