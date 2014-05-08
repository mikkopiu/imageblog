<?php

use App\Models\Category;
use App\Models\Article;

// Home page
Route::get('/', array('as' => 'home', function()
{
	// Redirect to Blog
	return Redirect::to('blog');
}));

// Blog front-page
Route::get('blog', array('as' => 'article.list', function()
{
	// Fetch all categories for listing
	$categories = Category::all();
	// Automatically create pagination (5 per page)
	$entries = Article::orderBy('created_at', 'desc')->paginate(5);

	// Return view
	return View::make('site::articles')
		->with('entries', $entries)
		->with('categories', $categories);
}));

// Article list (single category)
Route::get('blog/category/{id}', array('as' => 'category.list', function($id)
{
	// Find selected category
	$category = Category::find($id);

	if (!$category) {
		App::abort(404, 'Category not found');
	}

	// Load all articles using articles-method
	$entries = $category->articles;

	return View::make('site::category')
		->with('entries', $entries)
		->with('category', $category);
}));

// Single article
Route::get('blog/{slug}', array('as' => 'article', function($slug)
{
	// Find selected article
	$article = Article::where('slug', $slug)->first();

	if (!$article) {
		App::abort(404, 'Article not found');
	}

	// Load it's comments (empty array, if none), reacted in view
	$comments = $article->comments;

	return View::make('site::article')
		->with('entry', $article)
		->with('comments', $comments);
}));

// Single page
Route::get('{slug}', array('as' => 'page', function($slug)
{
	// Find selected page
	$page = Page::where('slug', $slug)->first();

	if (!$page) {
		App::abort(404, 'Page not found');
	}

	// Return approriate view
	return View::make('site::page')->with('entry', $page);

}))->where('slug', '^((?!admin).)*$');

// 404 Page
App::missing(function($exception)
{
	return Response::view('site::404', array(), 404);
});

Route::resource('comments', 'App\Controllers\CommentsController');