<?php

use App\Models\Category;

// Home page
Route::get('/', array('as' => 'home', function()
{
	return Redirect::to('blog');
}));

// Article list
Route::get('blog', array('as' => 'article.list', function()
{
	$categories = Category::all();
	$entries = Article::orderBy('created_at', 'desc')->get();
	return View::make('site::articles')
		->with('entries', $entries)
		->with('categories', $categories);
}));

// Single article
Route::get('blog/{slug}', array('as' => 'article', function($slug)
{
	$article = Article::where('slug', $slug)->first();
	$comments = $article->comments;

	if ( ! $article) App::abort(404, 'Article not found');

	return View::make('site::article')
		->with('entry', $article)
		->with('comments', $comments);
}));

// Single page
Route::get('{slug}', array('as' => 'page', function($slug)
{
	$page = Page::where('slug', $slug)->first();

	if ( ! $page) App::abort(404, 'Page not found');

	return View::make('site::page')->with('entry', $page);

}))->where('slug', '^((?!admin).)*$');

// 404 Page
App::missing(function($exception)
{
	return Response::view('site::404', array(), 404);
});

Route::resource('comments', 'App\Controllers\CommentsController');