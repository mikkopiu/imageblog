<?php namespace App\Services\Validators;

class CategoryValidator extends Validator {

	public static $messages = [
		'category.required'	=> 'Please type in a name for your category.',
		'category.regex'	=> 'Your category name may only contain letters, numbers, spaces, dashes (-) and underscores (_).'
	];

	public static $rules = [
		'category'		=> 'required|regex:/^[a-z0-9 .\-\_]+$/i'
	];
}