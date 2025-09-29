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
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(function(){
            session()->flash('feedback.message', 'Debes iniciar sesión para acceder a esa página');
            session()->flash('feedback.type', 'danger');
            return route('auth.showLogin');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
