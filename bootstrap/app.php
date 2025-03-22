<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registrar o middleware personalizado
        $middleware->alias([
            'tenant' => \App\Http\Middleware\TenantMiddleware::class,
        ]);

        // Outras configurações de middleware (opcional)
        // $middleware->append([]);
        // $middleware->prepend([]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
