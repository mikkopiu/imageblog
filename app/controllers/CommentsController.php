<?php namespace App\Controllers;

use App\Models\Comment;
use App\Models\Article;
use App\Services\Validators\CommentValidator;
use Input, Notification, Redirect, Sentry, Request;

// See PagesController for general comments
class CommentsController extends \BaseController {

	public function store()
	{
		$validation = new CommentValidator;

		if ($validation->passes()) {
			$req = Request::header('referer');
			$regex1 = '#(?<=blog/).*#';

			if(preg_match($regex1, $req, $matches)) {
				$req = $matches[0];
			}

			$article = Article::where('slug','=',$req)->first();
			$articleID = $article->id;

			$comment = new Comment;
			$comment->commenter = Input::get('commenter');
			$comment->body = Input::get('body');
			$comment->article_id = $articleID;
			$comment->save();

			Notification::success('The post was saved.');

			return Redirect::back();
		}
		
		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	public function destroy($id)
	{
		$comment = Comment::find($id);
		$articleID = $comment->article_id;
		$comment->delete();

		Notification::success('The comment was deleted.');

		return Redirect::route('admin.articles.show', $articleID);
	}

}