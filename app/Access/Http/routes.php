<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Routing\Router;

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

            $router->post(trans('routes.world.publish'), ['as' => prefix($prefix, 'world.publish'), 'uses' => 'WorldController@publish']);

            $router->get('{location_path}', ['as' => prefix($prefix, 'location.show'), 'uses' => 'LocationController@show']);

            $router->get('{location_path}/' . trans('routes.location.edit'), ['as' => prefix($prefix, 'location.edit'), 'uses' => 'LocationController@edit']);

            $router->get('{location_path}/' . trans('routes.location.create'), ['as' => prefix($prefix, 'location.create'), 'uses' => 'LocationController@create']);

            $router->post('{location_path}', ['as' => prefix($prefix, 'location.store'), 'uses' => 'LocationController@store']);

            $router->put('{location_path}', ['as' => prefix($prefix, 'location.update'), 'uses' => 'LocationController@update']);

        });
    });
}

function prefix($prefix, $name)
{
    return ($prefix ? $prefix . '.' : '') . $name;
}

function optional($prefix)
{
    return $prefix ? '{' . $prefix . '?}' : '';
}