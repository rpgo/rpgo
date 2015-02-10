<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class SetLanguage {

    /**
     * @var Application
     */
    private $app;

    function __construct(Application $app)
    {
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
        $route = $request->route();

        $lang = $route->parameter('lang');

        $this->app->setLocale($lang);

        $route->forgetParameter('lang');

        return $next($request);
	}

}
