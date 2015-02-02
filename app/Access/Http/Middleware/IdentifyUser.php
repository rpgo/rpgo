<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Rpgo\Support\Guard\Guard;

class IdentifyUser {

    /**
     * @var Guard
     */
    private $guard;
    /**
     * @var Application
     */
    private $app;

    function __construct(Guard $guard, Application $app)
    {
        $this->guard = $guard;
        $this->app = $app;
    }

    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = $this->guard()->user();

        $this->view()->share(compact('user'));

		return $next($request);
	}

    /**
     * @return View
     */
    private function view()
    {
        return $this->app->make('view');
    }

    /**
     * @return Guard
     */
    private function guard()
    {
        return $this->guard;
    }

}
