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
Route::get('/about', 'PagesController@about');
Route::get('/terms', 'PagesController@terms');
Route::get('/privacy', 'PagesController@privacy');
Route::get('/help', 'PagesController@help');
Route::get('/contact', 'PagesController@contact');

//Dashboard Route
Route::get('/profile/dashboard', ['middleware'=>'auth', 'uses'=>'PagesController@getDashboard']);

// Profile settings Route
Route::get('/profile/settings', 'PagesController@getProfileSettings');

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

// To reset user's password
Route::get('/password/email', 'Auth\PasswordController@getEmail');
Route::post('/password/email', 'Auth\PasswordController@postEmail');

Route::get('/password/reset', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');

// Authentication routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

// Social authentication routes...
Route::get('auth/{github}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{github}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/{twitter}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{twitter}/callback', 'Auth\AuthController@handleProviderCallback');
