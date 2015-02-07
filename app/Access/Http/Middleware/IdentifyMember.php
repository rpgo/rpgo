<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Rpgo\Application\Services\Guard;
use Rpgo\Application\Services\Guide;

class IdentifyMember {

    /**
     * @var Guard
     */
    private $guard;
    /**
     * @var Guide
     */
    private $guide;
    /**
     * @var Application
     */
    private $app;

    function __construct(Guard $guard, Guide $guide, Application $app)
    {
        $this->guard = $guard;
        $this->guide = $guide;
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
        $user = $this->guard->user();

        $member = $this->guide->member($user);

        $this->view()->share(compact('member'));

		return $next($request);
	}

    /**
     * @return View
     */
    private function view()
    {
        return $this->app->make('view');
    }

}
