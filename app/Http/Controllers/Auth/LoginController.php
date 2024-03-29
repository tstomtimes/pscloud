<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use \SocialiteProviders\Manager\ServiceProvider as Socialite;
use Illuminate\Support\Facades\Auth;
use Log;

class LoginController extends Controller
{
  use AuthenticatesUsers;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // public function login(AuthenticateUser $authenticateUser, Request $request)
    // {
    //   dd($user);
    //     return $authenticateUser->execute($request->has('code'));
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証に成功した
            return redirect()->intended('dashboard');
        }
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->forget( 'execute' );
        $request->session()->save();
        return redirect('/login');
    }
}
