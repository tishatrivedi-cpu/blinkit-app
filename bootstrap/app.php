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
        //
        $middleware->validateCsrfTokens(except:[
            'api_register',
            'api_login',
            'api_addorder',
            'api_getorder',
            'api_updateqty',
            'api_removeorder',
            'api_applycoupon',
            'api_confirmOrder',
            'api_getOrderhistory',
            'api_editprofile'

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
