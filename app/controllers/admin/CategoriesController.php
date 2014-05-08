<?php namespace App\Controllers\Admin;

use App\Models\Category;
use App\Services\Validators\CategoryValidator;
use Input, Notification, Redirect, Request, Sentry, Str;

/** PagesController uses Laravel's resourceful controller -functionality
 *  See manual for info
 *  Methods like index(), edit() need to be created for this
 *  Backslashes are needed due to namespace definition
 */
class CategoriesController extends \BaseController {

	// Shows all categories, used for listings
	public function index()
	{
		return \View::make('admin.categories.index')
			->with('categories', Category::all());
	}

	// Renders view for making new categories
	public function create()
	{
		$referer = Request::header('referer');
		$regex = '#create$#';

		// If category came from category create-page
		if (preg_match($regex, $referer)) {
			Notification::success('The category was succesfully created.');
			// Redirect back to index (avoid staying on page after store)
			return Redirect::route('admin.categories.index');
			break;
		} else {
			// Else make view as normal
			return \View::make('admin.categories.create');
		}
	}

	public function store()
	{
		// Prepare validator
		$validation = new CategoryValidator;

		// Validate given info
		if ($validation->passes()) {
			$category = new Category;
			$category->category = Input::get('category');
			$category->save();

			// Create new notification
			Notification::success('The category was succesfully created.');

			return Redirect::back()->withInput();
		}

		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	// Update specific category
	public function update($id)
	{
		$validation = new CategoryValidator;

		if ($validation->passes()) {
			$category = Category::find($id);
			$category->category = Input::get('category');
			$category->save();

			Notification::success('Changes saved.');

			return Redirect::route('admin.categories.index');
		}
		
		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	// Delete specific category
	public function destroy($id)
	{
		// Find category and delete it
		$category = Category::find($id);
		$category->delete();

		Notification::success('The category was deleted');
		// Redirect back to page-listing
		return Redirect::route('admin.categories.index');
	}
}