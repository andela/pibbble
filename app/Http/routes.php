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

Route::get('/', 'PagesController@home');
Route::get('/register', 'PagesController@sign_up');
Route::get('/login', 'PagesController@sign_in');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/terms', 'PagesController@terms');

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('social_auth_success');
});

Route::get('auth/{github}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{github}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/{twitter}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{twitter}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/{linkedin}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{linkedin}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/{google}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{google}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/logout', 'Auth\AuthController@getLogout');
