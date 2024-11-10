<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role == 'store' || Auth::user()->role == 'admin')) {
            return $next($request);
        }

        // Redirect or abort if user is not authorized
        return redirect('/unauthorized')->with('error', 'You do not have the required access.');
    }

}
