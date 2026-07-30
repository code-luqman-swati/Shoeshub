<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventMixedLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Customer is already logged in and tries to access Admin login
        if (
            $request->is('login') &&
            Auth::guard('customer')->check()
        ) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Please logout from your customer account first.');
        }

        // Admin is already logged in and tries to access Customer login
        if (
            $request->is('customer/login') &&
            Auth::guard('web')->check()
        ) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Please logout from your admin account first.');
        }

        return $next($request);
    }
}