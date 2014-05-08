<?php namespace App\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Services\Validators\ArticleValidator;
use Image, Input, Notification, Redirect, Sentry, Str;

// See PagesController for general comments
class ArticlesController extends \BaseController {

	public function index()
	{
		$categories = Category::lists('category');

		return \View::make('admin.articles.index')
			->with('articles', Article::all())
			->with('categories', $categories);
	}

	public function show($id)
	{
		if (Article::find($id)) {
			$comments = Article::find($id)->comments;

			return \View::make('admin.articles.show')
				->with('article', Article::find($id))
				->with('comments', $comments);
		} else {
			Notification::warning('No such article found.');

			return Redirect::route('admin.articles.index');
		}
	}

	public function create()
	{
		$categories = Category::lists('category','id');

		return \View::make('admin.articles.create')
			->with('categories', $categories);
	}

	public function store()
	{
		$validation = new ArticleValidator;

		if ($validation->passes()) {
			$article = new Article;
			$article->title = Input::get('title');
			$article->slug = Str::slug(Input::get('title'));
			$article->body = Input::get('body');
			$article->category_id = Input::get('category');
			$article->user_id = Sentry::getUser()->id;
			$article->save();

			// We now have the article ID, so we need to move the image
			if (Input::hasFile('image')) {
				$article->image = Image::upload(Input::file('image'), 'articles/' . $article->id);
				$article->save();
			}

			Notification::success('The post was saved.');

			return Redirect::route('admin.articles.index');
		}
		
		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	public function edit($id)
	{
		$categories = Category::lists('category','id');

		return \View::make('admin.articles.edit')
			->with('article', Article::find($id))
			->with('categories', $categories);
	}

	public function update($id)
	{
		$validation = new ArticleValidator;

		if ($validation->passes()) {
			
			$article = Article::find($id);
			$article->title = Input::get('title');
			$article->slug = Str::slug(Input::get('title'));
			$article->body = Input::get('body');
			$article->category_id = Input::get('category');
			$article->user_id = Sentry::getUser()->id;

			if (Input::hasFile('image')) {
				$article->image = Image::upload(Input::file('image'), 'articles/' . $article->id);
			}

			$article->save();

			Notification::success('The post was saved.');
			return Redirect::route('admin.articles.index');
		}

		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	public function destroy($id)
	{
		$article = Article::find($id);
		$article->delete();

		Notification::success('The post was deleted.');

		return Redirect::route('admin.articles.index');
	}
}