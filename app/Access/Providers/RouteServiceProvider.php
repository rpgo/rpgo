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

            foreach(['lang', ''] as $prefix)
            {
                $router->group(['prefix' => optional($prefix), 'middleware' => 'localization'], function (Router $router) use ($prefix) {

                    $router->group(['domain' => 'rpgo.' . config('app.tld')], function(Router $router) use ($prefix) {

                        $router->get(trans('routes.auth.login'), ['as' => prefix($prefix, 'auth.login'), 'uses' => 'Auth\AuthController@getLogin']);

                        $router->get(trans('routes.auth.logout'), ['as' => prefix($prefix, 'auth.logout'), 'uses' => 'Auth\AuthController@getLogout']);

                        $router->post(trans('routes.auth.login'), 'Auth\AuthController@postLogin');

                        $router->get(trans('routes.auth.register'), ['as' => prefix($prefix, 'auth.register'), 'uses' => 'UserController@create']);

                        $router->post(trans('routes.auth.register'), 'UserController@store');

                        $router->get(trans('routes.password.email'), ['as' => prefix($prefix, 'password.email'), 'uses' => 'Auth\PasswordController@getEmail']);

                        $router->post(trans('routes.password.email'), 'Auth\PasswordController@postEmail');

                        $router->get(trans('routes.password.reset') . "/{token}", ['as' => prefix($prefix, 'password.reset'), 'uses' => 'Auth\PasswordController@getReset']);

                        $router->post(trans('routes.password.reset'), 'Auth\PasswordController@postReset');

                        $router->get(trans("routes.worlds") . "/" . trans("routes.create"),
                            ['as' => prefix($prefix, 'worlds.create'), 'uses' => 'WorldController@create']
                        );

                        $router->post(trans("routes.worlds") . "/" . trans("routes.create"),
                            ['as' => prefix($prefix, 'worlds.store'), 'uses' => 'WorldController@store']
                        );

                        $router->get(trans("routes.worlds"), ['as' => ($prefix ? $prefix . '.' : '') . 'worlds.index', 'uses' => "WorldController@index"]);

                        $router->get('/', ['as' => prefix($prefix, 'home'), 'uses' => 'HomeController@index']);

                    });

                    $router->group(["domain" => "{slug}.rpgo." . config('app.tld'), 'middleware' => ['worlds', 'member', 'published']], function(Router $router) use ($prefix) {

                        $router->get('/', ['as' => prefix($prefix, 'worlds.show'), 'uses' => 'WorldController@show']);

                        $router->get(trans('routes.member.create'), ['as' => prefix($prefix, 'member.create'), 'uses' => 'MemberController@create', 'middleware' => 'stranger']);

                        $router->post(trans('routes.member.store'), ['as' => prefix($prefix, 'member.store'), 'uses' => 'MemberController@store']);

                        $router->get(trans('routes.dashboard.home'), ['as' => prefix($prefix, 'worlds.dashboard.main'), 'uses' => 'DashboardController@main', 'middleware' => 'admin']);

                        $router->get('{location}', ['as' => prefix($prefix, 'location.show'), 'uses' => 'LocationController@show'])->where('location', '.+');

                        $router->post(trans('routes.world.publish'), ['as' => prefix($prefix, 'world.publish'), 'uses' => 'WorldController@publish']);

                    });
                });
            }
		});
	}

}
