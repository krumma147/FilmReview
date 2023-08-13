<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (auth()->user() && auth()->user()->userType === 1) {
    //         return $next($request);
    //     }
    
    //     return redirect()->route('dashboard')->withErrors('Access denied.');
    // }
}
