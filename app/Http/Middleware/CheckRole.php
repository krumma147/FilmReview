<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth()->user()->userType != 2) {
        //     return redirect('/login');
        // }
        if (Auth::check() && Auth::user()->userType != 2) {
            return redirect('/home'); // Redirect to the homepage or wherever you want
        }
    
        return $next($request);
    }
}
