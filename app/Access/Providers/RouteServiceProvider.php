<?php namespace Rpgo\Access\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Rpgo\Access\Http\Controllers';

	/**
	 * Define your route model bindings, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $this->bootPatterns($router);

        $this->bootBindings($router);
    }

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
        $router->pattern('lang', '^(en|hu)$');

        $router->group(['namespace' => $this->namespace], function(Router $router)
		{
			require app_path('Access/Http/routes.php');


		});
	}

    /**
     * @param Router $router
     */
    private function bootPatterns(Router $router)
    {
        $router->pattern('location_path', '^(.(?!' . trans('routes.location.edit') . '$|' . trans('routes.location.create') . '$))+');
    }

    /**
     * @param Router $router
     */
    private function bootBindings(Router $router)
    {
        $router->bind('location_path', '\Rpgo\Access\Http\Parameters\LocationPath@bind');
    }

}
