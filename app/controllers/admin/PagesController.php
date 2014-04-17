<?php namespace App\Controllers\Admin;

use App\Models\Page;
use App\Services\Validators\PageValidator;
use Input, Notification, Redirect, Sentry, Str;

/** PagesController uses Laravel's resourceful controller -functionality
 *  See manual for info
 *  Methods like index(), edit() need to be created for this
 *  Backslashes are needed due to namespace definition
 */
class PagesController extends \BaseController {

	// Shows all pages, used for listings
	public function index()
	{
		return \View::make('admin.pages.index')->with('pages', Page::all());
	}

	// Shows specific page
	public function show($id)
	{
		return \View::make('admin.pages.show')->with('page', Page::find($id));
	}

	// Renders view for making new pages
	public function create()
	{
		return \View::make('admin.pages.create');
	}

	public function store()
	{
		// Prepare validator
		$validation = new PageValidator;

		// Validate given info
		if ($validation->passes())
		{
			$page = new Page;
			// Get user input into new Page
			$page->title   = Input::get('title');
			$page->slug    = Str::slug(Input::get('title'));
			$page->body    = Input::get('body');
			$page->user_id = Sentry::getUser()->id;
			$page->save();

			// Create new notification
			Notification::success('The page was saved.');

			return Redirect::route('admin.pages.edit', $page->id);
		}

		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	// Edit specific page
	public function edit($id)
	{
		return \View::make('admin.pages.edit')->with('page', Page::find($id));
	}

	// Update specific page
	public function update($id)
	{
		$validation = new PageValidator;

		if ($validation->passes()) {
			$page = Page::find($id); // Load selected page
			$page->title = Input::get('title');
			$page->slug = Str::slug(Input::get('title'));
			$page->body = Input::get('body');
			$page->user_id = Sentry::getUser()->id;
			$page->save();

			Notification::success('The page was saved.');

			return Redirect::route('admin.pages.edit', $page->id);
		}
		
		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	// Delete specific page
	public function destroy($id)
	{
		// Find page and delete it
		$page = Page::find($id);
		$page->delete();

		Notification::success('The page was deleted');
		// Redirect back to page-listing
		return Redirect::route('admin.pages.index');
	}
}