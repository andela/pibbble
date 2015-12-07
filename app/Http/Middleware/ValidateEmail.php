<?php

namespace Pibbble\Http\Middleware;

use Auth;
use Closure;
use Pibbble\User;

class ValidateEmail
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
        if ($request->_token === session('_token')) {
            User::create([
                '_token' => session('_token'),
                'username' => session('username'),
                'email' => session('email'),
                'password' => session('password'), ]);

            return redirect('/auth/login');
        }

        return $next($request);
    }
}
