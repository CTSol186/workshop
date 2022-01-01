<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     * Tanveer, added one line below this Point
     * We need to Register our Middleware in Kernal, before we can actually make any use of it!
     *
     */
    public function handle(Request $request, Closure $next)
    {
      if ( auth()->user()->role !== 'admin') {
        abort(404); //Actually it should be 403 -> Forbidden
      }
      return $next($request);
    }
}
