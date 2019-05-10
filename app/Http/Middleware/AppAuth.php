<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AppAuth
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
        {
		    return redirect("/login");
		}
		
		$user = Auth::user();
		
		if($user->auth_str != 'admin')
		{
			return redirect("/dashboard");
		}

        return $next($request);
    }
}