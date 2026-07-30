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
        if (!auth()->check() || auth()->user()->role !== 'admin' ) {
            return redirect('/login')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }

    protected function redirectTo(Request $request): ?string
{
    if ($request->is('customer/*') || $request->is('orders/*') || $request->is('payment/*')) {
        return route('customer.login');
    }

    return route('customer.login');
}
}
