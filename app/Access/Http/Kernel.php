<?php namespace Rpgo\Access\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
        'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
        'Illuminate\Cookie\Middleware\EncryptCookies',
        'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
        'Illuminate\Session\Middleware\StartSession',
        'Illuminate\View\Middleware\ShareErrorsFromSession',
        'Rpgo\Access\Http\Middleware\VerifyCsrfToken',
        'Rpgo\Access\Http\Middleware\IdentifyUser',
        'Rpgo\Access\Http\Middleware\SetLanguage',

	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'Rpgo\Access\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'Rpgo\Access\Http\Middleware\RedirectIfAuthenticated',
        'worlds' => 'Rpgo\Access\Http\Middleware\IdentifyWorld',
        'member' => 'Rpgo\Access\Http\Middleware\IdentifyMember',
        'stranger' => 'Rpgo\Access\Http\Middleware\HideFromMember',
        'admin' => 'Rpgo\Access\Http\Middleware\OnlyIfAdmin',
	];

}
