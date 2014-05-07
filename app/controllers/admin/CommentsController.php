<?php namespace App\Controllers\Admin;

use App\Models\Comment;
use App\Models\Article;
//use App\Services\Validators\CommentValidator;
use Input, Notification, Redirect, Sentry, Str;

// See PagesController for general comments
class CommentsController extends \BaseController {

	public function destroy($id)
	{
		$comment = Comment::find($id);
		$articleID = $comment->article_id;
		$comment->delete();

		Notification::success('The comment was deleted.');

		return Redirect::route('admin.articles.show', $articleID);
	}

}