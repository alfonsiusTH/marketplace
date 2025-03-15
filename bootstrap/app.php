<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'SellerMiddleware' => \App\Http\Middleware\SellerMiddleware::class,
            'ProductOwner' => \App\Http\Middleware\ProductOwner::class,
            'CartMiddleware' => \App\Http\Middleware\CartMiddleware::class,
            'CartItemsMiddleware' => \App\Http\Middleware\CartItemsMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
