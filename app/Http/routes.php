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
Route::get('/sort', ['uses' => 'PagesController@getLinks', 'as' => 'sort']);

/*
|------------------------------------------------------------------------------
| Team routes
|------------------------------------------------------------------------------
*/

Route::get('/teams', 'TeamController@index');
Route::get('/teams/new', ['uses' => 'TeamController@create', 'middleware' => 'auth']);

//Dashboard Route
Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'ProjectController@index']);

#Project routes using resource
Route::resource('projects', 'ProjectController');
Route::get('projects/meta/{id}', ['uses' => 'ProjectController@getMetaAsJSON', 'as' => 'getMetaAsJSON']);
// Confirm before delete
Route::get('project/confirm/{id}', 'ProjectController@confirm');

//like or unlike a project
Route::get('/project/like/{id}', [
    'uses' => 'ProjectLikesController@like',
    'middleware' => ['auth'],
]);

//update project views when a project is viewed
Route::get('/project/view/{id}', 'ProjectViewsController@view');

// Profile settings Route
Route::get('/settings/profile', [
    'uses' => 'ProfileController@getProfileSettings',
    'middleware' => ['auth'],
]);

Route::post('/avatar/setting', [
    'uses' => 'ProfileController@postAvatarSetting',
    'middleware' => ['auth'],
]);

Route::post('/settings/profile', 'ProfileController@updateProfileSettings');

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

// Gets users' profiles
Route::get('{username}', [
    'uses' => 'ProfileController@show',
    'as'   => 'userprofile',
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
Route::post('/auth/register', 'Auth\AuthController@sendMail');

// Social authentication routes...
Route::get('auth/{github}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{github}/callback', 'Auth\AuthController@handleProviderCallback');

// Route::get('auth/{twitter}', 'Auth\AuthController@redirectToProvider');
// Route::get('auth/{twitter}/callback', 'Auth\AuthController@handleProviderCallback');

// Project search
Route::post('/search', 'SearchController@search');

// OAuth form
Route::post('/errors/oauthname', 'Auth\AuthController@postOauth');
Route::get('/errors/oauthname', 'Auth\AuthController@getOauth');

// Make comments on projects
Route::post('/comment/{id}', 'CommentController@makeComment');

/*
|------------------------------------------------------------------------------
| Team routes
|------------------------------------------------------------------------------
*/

