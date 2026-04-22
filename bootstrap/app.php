<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\PostTooLargeException; // Import this
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        // ADD THIS PART HERE:
        $exceptions->render(function (PostTooLargeException $e, Request $request) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'The files you are trying to upload are too large for the server. Please upload fewer or smaller images.']);
        });

    })->create();