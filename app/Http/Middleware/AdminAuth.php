<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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

        if (session()->has('patient')) {
            return back();
        }


        if ((session()->has('admin') || session()->has('reception')) && ($request->path() == 'login' || $request->path() == 'register')) {

            return back();
        }


        if ((!session()->has('admin') && !session()->has('reception')) && ($request->path() != 'login' || $request->path() != 'register')) {
            return redirect('/login')->with('erreur', 'Identifier vous!');
        }



        return $next($request);
    }
}
