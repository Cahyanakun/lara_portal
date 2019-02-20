<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo( ) {
        if (Auth::check() && Auth::user()->role == 'mahasiswa') {
            return '/homemahasiswa';
        }
        elseif (Auth::check() && Auth::user()->role == 'dosen') {
            return '/homedosen';
        }
        else {
            return '/homesuper';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials (Request $request)
    {
        $request['is_active'] = 1;
        return $request->only('email','password','is_active');
    }
}
