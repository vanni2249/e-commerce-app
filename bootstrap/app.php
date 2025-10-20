<?php

// use Illuminate\Container\Attributes\Auth;

use App\Http\Middleware\LanguageMiddleware;
use App\Http\Middleware\RedirectAuthUsers;
use App\Http\Middleware\RedirectGuestUsers;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register language middleware to web group (after session middleware)
        $middleware->web(append: [
            LanguageMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
