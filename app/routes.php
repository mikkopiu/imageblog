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
	Route::any('/', 'App\Controllers\Admin\PagesController@index');
	Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
	Route::resource('pages', 'App\Controllers\Admin\PagesController');
});

Route::get('admin/logout', ['as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout']);
Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin']);
Route::post('admin/login', ['as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin']);
