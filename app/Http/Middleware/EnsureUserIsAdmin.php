<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::user() != null && Auth::user()->isAdmin)
        if (!Auth::user()->isAdmin()) {

            return abort(401);
            // return redirect->route();
        }
        return $next($request); //cette action veut dire qu'il passe la main o middleware svt
    }
}
