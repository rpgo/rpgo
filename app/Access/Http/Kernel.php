<?php namespace Rpgo\Access\Http;

use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Rpgo\Access\Http\Middleware\Authenticate;
use Rpgo\Access\Http\Middleware\IdentifyUser;
use Rpgo\Access\Http\Middleware\RedirectIfAuthenticated;
use Rpgo\Access\Http\Middleware\SetLanguage;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		CheckForMaintenanceMode::class,
		EncryptCookies::class,
		AddQueuedCookiesToResponse::class,
		StartSession::class,
		ShareErrorsFromSession::class,
		VerifyCsrfToken::class,
        SetLanguage::class,
        IdentifyUser::class,
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => Authenticate::class,
		'auth.basic' => AuthenticateWithBasicAuth::class,
		'guest' => RedirectIfAuthenticated::class,
        'worlds' => 'Rpgo\Access\Http\Middleware\IdentifyWorld',
	];

}
