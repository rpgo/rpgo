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

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get(Lang::get("routes.worlds") . "/" . Lang::get("routes.create"),
    ['as' => 'worlds.create', 'uses' => 'WorldController@create']
);

Route::post(Lang::get("routes.worlds") . "/" . Lang::get("routes.create"),
    ['as' => 'worlds.store', 'uses' => 'WorldController@store']
);

Route::get(Lang::get("routes.worlds"), ['as' => 'worlds.index', 'uses' => "WorldController@index"]);

Route::group(["domain" => "{slug}.rpgo.{tld}"], function(){
    Route::get('/', ['as' => 'worlds.show', 'uses' => 'WorldController@show']);
});


Route::get('/', 'WelcomeController@index');