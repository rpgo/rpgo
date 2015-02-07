<?php namespace Rpgo\Access\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Rpgo\Application\Exception\WorldNotFoundException;
use Rpgo\Application\Services\Guide;

class IdentifyWorld {

    /**
     * @var Guide
     */
    private $guide;
    /**
     * @var Application
     */
    private $app;

    function __construct(Guide $guide, Application $app)
    {
        $this->guide = $guide;
        $this->app = $app;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws WorldNotFoundException
     */
	public function handle($request, Closure $next)
	{
        $slug = $request->route('slug');

        $world = $this->guide->world($slug);

        if( ! $world)
            throw new WorldNotFoundException(404);

        $this->view()->share(compact('world'));

        $request->route()->forgetParameter('slug');

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
