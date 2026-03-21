<?php

use App\Http\Middleware\CheckRole;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Inertia\Inertia;
use Illuminate\Http\Request;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
        // но роуты role
        $middleware->alias([
            'role' => CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, Request $request) {
            // 404
            if ($e instanceof NotFoundHttpException) {
                return Inertia::render('Dashboard/Errors/NotFound')
                    ->toResponse($request)
                    ->setStatusCode(404);
            }
            // 405
            if ($e instanceof MethodNotAllowedHttpException) {
                return Inertia::render('Dashboard/Errors/NotFound')
                    ->toResponse($request)
                    ->setStatusCode(404);
            }
            // 403
            if ($e instanceof HttpException && $e->getStatusCode() === 403) {
                return Inertia::render('Dashboard/Errors/Forbidden')
                    ->toResponse($request)
                    ->setStatusCode(403);
            }
            return null;
        });
    })->create();
