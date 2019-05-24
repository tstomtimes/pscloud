<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialize;
use App\User;

class AuthController extends \App\Http\Controllers\Controller
{

    /**
     * Redirect the user to the Graph authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialize::with('graph')->redirect();
    }

    /**
     * Obtain the user information from graph.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        try{
            $userSocial = Socialize::with('graph')->user();
            $user = User::where(['email' => $userSocial->getEmail()])->first();
            debug("I'm back!");
            if(empty($user)){
              debug("We have not such a name here! Let's make that!");
                $newuser = new User;
                $newuser->name = $userSocial->getName();
                $newuser->email = $userSocial->getEmail();
                $newuser->auth_str = 'guest';
                $newuser->save();
                $user = $newuser;
                if (Auth::check()) {
                    route('verification.resend');
                }
            }
            debug("Login check!");
            Auth::login($user);
            debug("Let's move to Dashboad"); 
            return redirect("/dashboard");
        } catch(\Exception $e) {
            return redirect("/");
        }
    }
}
