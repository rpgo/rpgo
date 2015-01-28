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

Route::group(['prefix' => '{lang?}', 'before' => 'localization'], function (){
    Route::group(['domain' => 'rpgo.' . config('app.tld')], function() {

        Route::get(trans('routes.auth.login'), ['as' => 'lang.auth.login', 'uses' => 'Auth\AuthController@getLogin']);

        Route::get(trans('routes.auth.logout'), ['as' => 'lang.auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

        Route::post(trans('routes.auth.login'), 'Auth\AuthController@postLogin');

        Route::get(trans('routes.auth.register'), ['as' => 'lang.auth.register', 'uses' => 'Auth\AuthController@getRegister']);

        Route::post(trans('routes.auth.register'), 'Auth\AuthController@postRegister');

        Route::get(trans('routes.password.email'), ['as' => 'lang.password.email', 'uses' => 'Auth\PasswordController@getEmail']);

        Route::post(trans('routes.password.email'), 'Auth\AuthController@postEmail');

        Route::get(trans('routes.password.reset') . "/{token}", ['as' => 'lang.password.reset', 'uses' => 'Auth\PasswordController@getReset']);

        Route::post(trans('routes.password.reset'), 'Auth\AuthController@postReset');

        Route::get(trans("routes.worlds") . "/" . trans("routes.create"),
            ['as' => 'lang.worlds.create', 'uses' => 'WorldController@create']
        );

        Route::post(trans("routes.worlds") . "/" . trans("routes.create"),
            ['as' => 'lang.worlds.store', 'uses' => 'WorldController@store']
        );

        Route::get(trans("routes.worlds"), ['as' => 'lang.worlds.index', 'uses' => "WorldController@index"]);

        Route::get('/', ['as' => 'lang.home', 'uses' => 'HomeController@index']);

    });

    Route::group(["domain" => "{slug}.rpgo." . config('app.tld')], function(){

        Route::get('/', ['as' => 'lang.worlds.show', 'uses' => 'WorldController@show']);

    });
});

Route::group(['domain' => 'rpgo.' . config('app.tld')], function() {

    Route::get(trans('routes.auth.login'), ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);

    Route::get(trans('routes.auth.logout'), ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

    Route::post(trans('routes.auth.login'), 'Auth\AuthController@postLogin');

    Route::get(trans('routes.auth.register'), ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);

    Route::post(trans('routes.auth.register'), 'Auth\AuthController@postRegister');

    Route::get(trans('routes.password.email'), ['as' => 'password.email', 'uses' => 'Auth\PasswordController@getEmail']);

    Route::post(trans('routes.password.email'), 'Auth\AuthController@postEmail');

    Route::get(trans('routes.password.reset') . "/{token}", ['as' => 'password.reset', 'uses' => 'Auth\PasswordController@getReset']);

    Route::post(trans('routes.password.reset'), 'Auth\AuthController@postReset');

    Route::get(trans("routes.worlds") . "/" . trans("routes.create"),
        ['as' => 'worlds.create', 'uses' => 'WorldController@create']
    );

    Route::post(trans("routes.worlds") . "/" . trans("routes.create"),
        ['as' => 'worlds.store', 'uses' => 'WorldController@store']
    );

    Route::get(trans("routes.worlds"), ['as' => 'worlds.index', 'uses' => "WorldController@index"]);

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

});

Route::group(["domain" => "{slug}.rpgo." . config('app.tld')], function(){

    Route::get('/', ['as' => 'worlds.show', 'uses' => 'WorldController@show']);

});