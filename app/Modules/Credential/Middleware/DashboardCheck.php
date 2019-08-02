<?php

namespace App\Modules\Credential\Middleware;

use Closure;

class DashboardCheck
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
        if(get_role()->slug == 'client')
        {
           return redirect()->route('public');
        }

        return $next($request);
    }
}
