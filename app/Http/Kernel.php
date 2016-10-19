<?php

namespace PaperStore\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/**
 * Class Kernel
 * @package PaperStore\Http
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \PaperStore\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \PaperStore\Http\Middleware\VerifyCsrfToken::class,
            \PaperStore\Http\Middleware\LocaleMiddleware::class,
        ],

        'admin' => [
            'web',
            'auth',
            'access.routeNeedsPermission:view-backend',
            'timeout',
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \PaperStore\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \PaperStore\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'timeout' => \PaperStore\Http\Middleware\SessionTimeout::class,

        /**
         * Access Middleware
         */
        'access.routeNeedsRole' => \PaperStore\Http\Middleware\RouteNeedsRole::class,
        'access.routeNeedsPermission' => \PaperStore\Http\Middleware\RouteNeedsPermission::class,
    ];
}
