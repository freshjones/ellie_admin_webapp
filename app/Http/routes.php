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



Route::get('sites', ['as' => 'sites.index', 'uses' => 'SitesController@index'] );
Route::post('site', ['as' => 'sites.store', 'uses' => 'SitesController@store'] );
Route::get('site/create', ['as' => 'sites.create', 'uses' => 'SitesController@create'] );

Route::get('site/{site}', ['as' => 'site.index', 'uses' => 'SiteController@index'] );
Route::get('site/{site}/users', ['as' => 'site.users', 'uses' => 'SiteController@users'] );
Route::get('site/{site}/plan', ['as' => 'site.plan', 'uses' => 'SiteController@plan'] );
Route::get('site/{site}/billing', ['as' => 'site.billing', 'uses' => 'SiteController@billing'] );
Route::get('site/{site}/domains', ['as' => 'site.domains', 'uses' => 'SiteController@domains'] );
Route::get('site/{site}/configuration', ['as' => 'site.settings', 'uses' => 'SiteController@settings'] );


Route::resource('account', 'AccountController' );
Route::resource('help', 'HelpController' );


class SiteBuilder {

	public function fire($job, $data)
	{

		/*
		 * array:4 [▼
			  "name" => "billy"
			  "url" => "billy"
			  "template_id" => "1"
			  "colorscheme_id" => "1"
			]
		 */

		//execute the site builder script
		$command = getenv('PHING') . ' -f ' . getenv('SITEBUILDER') . '/build.xml'
						. ' -Dbuilddir="' . $data['url']. '"'
						. ' -Dsitename="' . $data['name'] . '"'
						. ' -Dsitetemplate="' . $data['template_id'] . '"'
						. ' -Dsitecolor="' . $data['colorscheme_id'] . '"'
						. '';

		exec($command);

	}

}


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