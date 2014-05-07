<?php namespace App\Controllers\Admin;

use App\Models\Article;
use App\Services\Validators\ArticleValidator;
use Image, Input, Notification, Redirect, Sentry, Str;

// See PagesController for general comments
class ArticlesController extends \BaseController {

	public function index()
	{
		return \View::make('admin.articles.index')->with('articles', Article::all());
	}

	public function show($id)
	{
		return \View::make('admin.articles.show')->with('article', Article::find($id));
	}

	public function create()
	{
		return \View::make('admin.articles.create');
	}

	public function store()
	{
		$validation = new ArticleValidator;

		if ($validation->passes()) {
			$article = new Article;
			$article->title = Input::get('title');
			$article->slug = Str::slug(Input::get('title'));
			$article->body = Input::get('body');
			$article->category = Input::get('category');
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
		$comments = Article::find($id)->comments;

		return \View::make('admin.articles.edit')
			//->with('comments', $comments)
			->with('article', Article::find($id));
	}

	public function update($id)
	{
		$validation = new ArticleValidator;

		if ($validation->passes()) {
			$article = Article::find($id);
			$article->title = Input::get('title');
			$article->slug = Str::slug(Input::get('title'));
			$article->body = Input::get('body');
			$article->category = Input::get('category');
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