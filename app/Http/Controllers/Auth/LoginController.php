<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function authenticated(Request $request) {
        if (!Auth::user()->hasRole('users')) {
            return redirect()->route('admin.index');
        }

        if (Auth::user()->email_verified_at == NULL) {
            $id = Auth::user()->id;
            $this->guard()->logout();
            return redirect()->route('login')->with('need verify', $id);
        }

        return redirect()->route('profile.index');
    }
}
