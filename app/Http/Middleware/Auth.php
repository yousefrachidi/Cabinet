<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('patient') && ($request->path() != 'login' && $request->path() != 'register')) {
            return redirect('/login')->with('erreur', 'Identifier vous!');
        }
        if (session()->has('patient') && ($request->path() == 'login' || $request->path() == 'register')) {
            return back();
        }
        return $next($request);
    }
}
