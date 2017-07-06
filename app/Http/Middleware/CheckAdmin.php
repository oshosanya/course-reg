<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAdmin
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
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role!=1)
            {
                Auth::logout();
                return redirect('/admin')->with([
                        'warning' => 'Incorrect credentials'
                    ]);
            }
        }
        else
        {
            return redirect('/admin')->with([
                        'warning' => 'Please Log in to use the application'
                    ]);
        }
        return $next($request);
    }
}
