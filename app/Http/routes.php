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

Route::get('/', function () {
    return view('welcome');
});
Route::get('users/register', 'Auth\AuthController@getRegister');
Route::post('users/register', 'Auth\AuthController@postRegister');
Route::get('users/logout', 'Auth\AuthController@getLogout');
Route::get('users/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');
