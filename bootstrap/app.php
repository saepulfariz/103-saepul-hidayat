<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // semua route pake middleware, maka halaman login juga jadi ERR_TOO_MANY_REDIRECTS
        // $middleware->append(Authenticate::class);

        // jika mau tambahkan beberapa middleware
        // $middleware->use([
        //     Authenticate::class
        // ]);

        // alias middleware
        $middleware->alias([
            "authenticate" => Authenticate::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
