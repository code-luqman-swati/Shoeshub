<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

->withMiddleware(function (Middleware $middleware) {


    

 $middleware->alias([
        'permission' => \App\Http\Middleware\PermissionMiddleware::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ]);

    $middleware->redirectGuestsTo(function ($request) {


        if (
            $request->is('cart') ||
            $request->is('checkout') ||
            $request->is('orders/*') ||
            $request->is('products') ||
            $request->is('payment/*')
        ) {
            return route('customer.login');
        }


        return route('customer.login');


    });


})
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
