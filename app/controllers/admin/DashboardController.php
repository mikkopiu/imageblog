<?php namespace App\Controllers\Admin;

use App\Models\Page;
use App\Models\Article;
use App\Models\Category;
use App\Services\Validators\PageValidator;
use Input, Notification, Redirect, Sentry, Str;

/** DashboardController uses Laravel's resourceful controller -functionality
 *  See manual for info
 *  Methods like index() need to be created for this
 *  Backslashes are needed due to namespace definition
 */
class DashboardController extends \BaseController {

	// Shows all pages, used for listings
	public function index()
	{
		$pages = Page::all();
		$articles = Article::all()->take(5);
		$categories = Category::lists('category','id');
		
		return \View::make('admin.dashboard')
			->with('pages', $pages)
			->with('articles', $articles)
			->with('categories', $categories);
	}
}