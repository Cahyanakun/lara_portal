<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Dosen
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
        if (Auth::check() && Auth::user()->role == 'dosen') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'mahasiswa') {
            return redirect('/homemahasiswa');
        }
        else {
            return redirect('/homesuper');
        }
    }
}
