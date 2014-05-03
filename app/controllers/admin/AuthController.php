<?php namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends BaseController {

	/**
	 * Display login page
	 * @return view
	 */
	public function getLogin()
	{
		// Get admin-login view
		return View::make('admin.auth.login');
	}

	/**
	 * Login action
	 * @return Redirect
	 */
	public function postLogin()
	{
		// Get user input into array
		$credentials = [
			'email'		=> Input::get('email'),
			'password'	=> Input::get('password')
		];

		// Try to validate using Sentry's authenticate
		try
		{
			$user = Sentry::authenticate($credentials, false);

			if ($user)
			{
				// If succesfull, redirect to admin-pages
				return Redirect::route('admin.dashboard');
			}
		} catch(\Exception $e)
		{
			// In case login fails, redirect to login page
			//  with errors to display
			return Redirect::route('admin.login')->withErrors(['login' => $e->getMessage()]);
		}
	}

	/**
	 * Logout action
	 * @return Redirect
	 */
	public function getLogout()
	{
		// Sentry's built-in logout function
		Sentry::logout();

		// Redirect user to login
		return Redirect::route('admin.login');
	}
}