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

Route::get('/', 'WelcomeController@index');

Route::get('templates', ['as' => 'templates', 'uses' => 'PagesController@templates'] );

Route::get('signup', ['as' => 'signup', 'uses' => 'SignupController@create'] );
Route::post('signup-create', ['as' => 'signup.store', 'uses' => 'SignupController@store'] );

Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'PagesController@dashboard'] );

Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout'] );
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login'] );
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin'] );

/*
 * Sites Routes
 */
Route::group(['namespace' => 'Sites'], function() {
	Route::get('sites', ['as' => 'sites.index', 'uses' => 'SitesController@index']);
	Route::get('sites/update', ['as' => 'sites.update', 'uses' => 'SitesController@update']);
	Route::post('site', ['as' => 'sites.store', 'uses' => 'SitesController@store'] );
	Route::get('site/create', ['as' => 'sites.create', 'uses' => 'SitesController@create'] );
});


/*
 * Site Routes
 */
Route::group(['prefix' => 'site', 'namespace' => 'Site'], function() {
	Route::get('{site}', ['as' => 'site.index', 'uses' => 'SiteController@index'] );
	Route::get('{site}/users', ['as' => 'site.users', 'uses' => 'SiteController@users'] );
	Route::get('{site}/plan', ['as' => 'site.plan', 'uses' => 'SiteController@plan'] );
	Route::get('{site}/billing', ['as' => 'site.billing', 'uses' => 'SiteController@billing'] );
	Route::get('{site}/domains', ['as' => 'site.domains', 'uses' => 'SiteController@domains'] );
	Route::get('{site}/configuration', ['as' => 'site.settings', 'uses' => 'SiteController@settings'] );
	Route::get('{site}/self-update', ['as' => 'site.selfupdate', 'uses' => 'SiteController@update'] );

	Route::get('{site}/delete', ['as' => 'site.confirm.delete', 'uses' => 'SiteController@confirmDelete'] );
	Route::post('{site}/delete', ['as' => 'site.delete', 'uses' => 'SiteController@delete'] );

	Route::get('{site}/stop', ['as' => 'site.confirm.stop', 'uses' => 'SiteController@confirmStop'] );
	Route::post('{site}/stop', ['as' => 'site.stop', 'uses' => 'SiteController@stop'] );

	Route::get('{site}/start', ['as' => 'site.confirm.start', 'uses' => 'SiteController@confirmStart'] );
	Route::post('{site}/start', ['as' => 'site.start', 'uses' => 'SiteController@start'] );
});

Route::resource('account', 'AccountController' );
Route::resource('help', 'HelpController' );

Route::group(['prefix' => 'api/v1', 'namespace' => 'Api'], function()
{
	//Route::get('site-version', ['as' => 'api.site.version', 'uses' => 'SiteController@index']);
});


//Route::resource('sites', 'SitesController' );

//Route::controller('auth', 'Auth\AuthController');

/*
Route::resource('signup{{step}}', 'SignupController', [
	'names' => [ 'index' => 'signup.index', 'create' => 'signup.create', 'store' => 'signup.store'],
	'only' => ['index','create','store']
]);
*/

//Route::get('home', 'HomeController@index');
//Route::controller('auth', 'Auth\AuthController');
//Route::controller('password', 'Auth\PasswordController');

/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/