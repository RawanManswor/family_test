<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admine
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->roles) {
            foreach (auth()->user()->roles as $role) {
                if ($role->name == 'Admin') {

                    return $next($request);
                }
            }
            return redirect('/');
        }
        // if (auth()->user() && auth()->user()->role === 'user') {
        //     return $next($request);
        // }

        // return redirect('/');
    }
}
