<?php

namespace Pibbble\Http\Middleware;

use Auth;
use Pibbble\User;
use Closure;

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
        if ($request->_token === $request->session()->get('_token')) {
            User::create($request->session()->all());
            return redirect('/auth/login');
        }

        return $next($request);
    }
}
