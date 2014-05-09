<?php namespace App\Services\Validators;

class UserValidator extends Validator {

	public static $messages = [
			'email.required'		=> 'Please type in your email.',
			'email.email'			=> 'Please type your email in the correct format.',
			'first_name.required'	=> 'Please type in your first name.',
			'first_name.alpha'		=> 'Your first name can only have letters, sorry.',
			'last_name.required'	=> 'Please type in your surname.',
			'last_name.alpha'		=> 'Your surname can only have letters, sorry.'
	];

	public static $rules = [
		'email'			=> 'required|email',
		'first_name'	=> 'required|alpha',
		'last_name' 	=> 'required|alpha'
	];
}