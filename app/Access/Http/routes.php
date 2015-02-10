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

function prefix($prefix, $name)
{
    return ($prefix ? $prefix . '.' : '') . $name;
}

function optional($prefix)
{
    return $prefix ? '{' . $prefix . '?}' : '';
}