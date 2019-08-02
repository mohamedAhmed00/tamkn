<?php

namespace App\Modules\Credential\Middleware;

use Closure;
use Auth;

class ClientDashboardCheck
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
        if(Auth::check()) {

            dd(Auth::check());

        }
//        if(empty(auth()->user()->role_id))
//        {
//            return redirect('/_admin_/base');
//        }
        return $next($request);
    }
}
