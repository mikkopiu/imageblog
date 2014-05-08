<?php namespace App\Services\Validators;

class PageValidator extends Validator {

	public static $messages = [
		'title.required'	=> 'Please type in the page title.',
		'title.regex'		=> 'Your page title may only contain letters, numbers, spaces, dashes (-) and underscores (_).'
	];

	public static $rules = [
		'title'		=> 'required|regex:/^[a-z0-9 .\-\_]+$/i'
	];
}