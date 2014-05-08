<?php namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Notification, Redirect, Sentry, View;

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
				Notification::success('Logged in succesfully.');
				// If succesfull, redirect to admin-pages
				return Redirect::route('admin.dashboard');
			}
		}
		// Missing email input
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => 'Please type in your email.'));
		}
		// Missing password input
		catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => 'Please type in your password.'));
		}
		// Incorrect password
		catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => 'Wrong password, please try again.'));
		}
		// User not found in DB
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => 'No user found with given email.'));
		}
		// User not activated in DB
		catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => 'User is not activated.'));
		}
		// User account suspended (future use)
		catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => 'User is suspended.'));
		}
		// User account banned (future use)
		catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			return Redirect::route('admin.login')->withErrors(array('login' => 'User is banned.'));
		}
		// Catch all exception
		catch(\Exception $e)
		{
			// In case login fails, redirect to login page
			//  with errors to display
			return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
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

		Notification::info('Logged out.');
		// Redirect user to login
		return Redirect::route('admin.login');
	}
}