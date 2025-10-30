<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            'web' => __DIR__.'/../routes/web.php', // Public Users View
            'panel' => __DIR__.'/../routes/panel.php', // Control Panel Dashboard
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register our middlewares
        $middleware->alias([
            'Auth.panel' => \App\Http\Middleware\PanelAuth::class,
            'Auth.users' => \App\Http\Middleware\UsersAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
