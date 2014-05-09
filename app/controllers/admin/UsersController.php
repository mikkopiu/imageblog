<?php namespace App\Controllers\Admin;

use App\Models\User;
use App\Services\Validators\UserValidator;
use Input, Notification, Redirect, Sentry;

class UsersController extends \BaseController {

	protected $user;

	public function showUser()
	{
		$user = Sentry::getUser();
		return \View::make('admin.settings')
			->with('user', $user);
	}

	public function update()
	{
		$validation = new UserValidator;

		if ($validation->passes()) {

			try
			{
				// Find the user using the user id
				$user = Sentry::getUser();

				// Update the user details
				$user->email = Input::get('email');
				$user->first_name = Input::get('first_name');
				$user->last_name = Input::get('last_name');

				// Update the user
				if ($user->save()) {
					Notification::success('Succesfully updated user information.');

					$user = Sentry::getUser();
					return Redirect::route('admin.user')
						->with('user', $user);
				} else {
					Notification::warning('Something went wrong with the update.');

					$user = Sentry::getUser();
					return Redirect::route('admin.user')
						->with('user', $user);
				}
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				echo 'User was not found.';
			}
		} else {
			return Redirect::back()->withInput()->withErrors($validation->errors);
		}
	}
}