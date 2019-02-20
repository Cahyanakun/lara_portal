<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::check() && Auth::user()->role == 'mahasiswa') {
                return redirect('/homemahasiswa');
            }
            elseif (Auth::check() && Auth::user()->role == 'dosen') {
                return redirect('/homedosen');
            }
            else {
                return redirect('/homesuper');
            }
        }

        return $next($request);
    }
}
