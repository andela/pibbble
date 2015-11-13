<?php

namespace Pibbble\Http\Middleware;

use Closure;

class HasUser
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
        if (! $request->session()->has('user')) {
            return redirect('/');
        }

        return $next($request);
    }
}
