<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Admin Authentication routes */
Route::group(['prefix' => 'admin', 'before' => 'auth.admin'], function()
{
	Route::any('/', 'App\Controllers\Admin\DashboardController@index');
	Route::get('dashboard',['as'=>'admin.dashboard', 'uses'=>'App\Controllers\Admin\DashboardController@index']);
/*
	Route::get('admin/settings', array('as' => 'admin.settings', function(){
		$user = Sentry::getUser();

		return View::make('admin.settings')
			->with('user', $user);
	}));
	Route::get('admin/settings', array('as' => 'admin.settings.updateInfo', function(){
		Notification::success('Information changed succesfully.');
		$user = Sentry::getUser();

		return View::make('admin.settings')
			->with('user', $user);
	}));
*/
	Route::get('user', array('as'=>'admin.user','uses' => 'App\Controllers\Admin\UsersController@showUser'));
	Route::put('user', array('as'=>'admin.user.update','uses' => 'App\Controllers\Admin\UsersController@update'));

	Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
	Route::resource('pages', 'App\Controllers\Admin\PagesController');
	Route::resource('categories', 'App\Controllers\Admin\CategoriesController');
});

Route::resource('comments', 'App\Controllers\CommentsController');

Route::get('admin/logout', ['as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout']);
Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin']);
Route::post('admin/login', ['as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin']);