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

Route::filter('localization', function() {
    App::setLocale(Route::input('lang'));
});

foreach(['lang', ''] as $prefix)
{
    Route::group(['prefix' => optional($prefix), 'before' => 'localization'], function () use ($prefix) {

        Route::group(['domain' => 'rpgo.' . config('app.tld')], function() use ($prefix) {

            Route::get(trans('routes.auth.login'), ['as' => prefix($prefix, 'auth.login'), 'uses' => 'Auth\AuthController@getLogin']);

            Route::get(trans('routes.auth.logout'), ['as' => prefix($prefix, 'auth.logout'), 'uses' => 'Auth\AuthController@getLogout']);

            Route::post(trans('routes.auth.login'), 'Auth\AuthController@postLogin');

            Route::get(trans('routes.auth.register'), ['as' => prefix($prefix, 'auth.register'), 'uses' => 'Auth\AuthController@getRegister']);

            Route::post(trans('routes.auth.register'), 'Auth\AuthController@postRegister');

            Route::get(trans('routes.password.email'), ['as' => prefix($prefix, 'password.email'), 'uses' => 'Auth\PasswordController@getEmail']);

            Route::post(trans('routes.password.email'), 'Auth\PasswordController@postEmail');

            Route::get(trans('routes.password.reset') . "/{token}", ['as' => prefix($prefix, 'password.reset'), 'uses' => 'Auth\PasswordController@getReset']);

            Route::post(trans('routes.password.reset'), 'Auth\PasswordController@postReset');

            Route::get(trans("routes.worlds") . "/" . trans("routes.create"),
                ['as' => prefix($prefix, 'worlds.create'), 'uses' => 'WorldController@create']
            );

            Route::post(trans("routes.worlds") . "/" . trans("routes.create"),
                ['as' => prefix($prefix, 'worlds.store'), 'uses' => 'WorldController@store']
            );

            Route::get(trans("routes.worlds"), ['as' => ($prefix ? $prefix . '.' : '') . 'worlds.index', 'uses' => "WorldController@index"]);

            Route::get('/', ['as' => prefix($prefix, 'home'), 'uses' => 'HomeController@index']);

        });

        Route::group(["domain" => "{slug}.rpgo." . config('app.tld')], function() use ($prefix) {

            Route::get('/', ['as' => prefix($prefix, 'worlds.show'), 'uses' => 'WorldController@show']);

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