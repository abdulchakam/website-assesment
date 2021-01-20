<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $login = request()->input('username');

        if (is_numeric($login)) {
            $field = 'nip';
        }else{
            $field = 'username';
        }
        request()->merge([$field => $login]);
        return $field;
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('admin') || $user->hasRole('super admin') ){
            return redirect()->route('dashboard');
        }elseif($user->hasRole('user')){
            return redirect()->route('home');
        }
    }
}
