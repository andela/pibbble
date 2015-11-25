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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if ($request->_token === $request->session()->pull('_token')) {
            Auth::login(User::create($request->session()->all()));
        }

=======
        if ($request->has('_token') && $request->session()->has('_token') 
=======
        if ($request->has('_token') && $request->session()->has('_token')
>>>>>>> 7d005a3... [Pibbble][#108779138] Add Email Verification to the registration process.
            && $request->_token === $request->session()->pull('_token')) {
            Auth::login(User::create($request->session()->all()));
=======
        if ($request->has('_token') && $request->session()->has('_token'))
        {
            if ($request->_token === $request->session()->pull('_token')) 
            {
=======
        if ($request->has('_token') && $request->session()->has('_token')) {
            if ($request->_token === $request->session()->pull('_token')) {
>>>>>>> 2216b17... [Pibbble][#108779138] Apply fixes from StyleCI
                Auth::login(User::create($request->session()->all()));
            }
>>>>>>> 9fe73d4... [Pibbble][#108779138] Refactor
=======
        if ($request->_token === $request->session()->pull('_token')) {
            Auth::login(User::create($request->session()->all()));
>>>>>>> 83e268c... [Pibbble][#108779138] Add email verification to the registration process
        }
<<<<<<< HEAD
        
>>>>>>> 050ce14... [Pibbble][#108779138] Add email verification to the registration process.
=======

>>>>>>> 7d005a3... [Pibbble][#108779138] Add Email Verification to the registration process.
        return $next($request);
    }
}
