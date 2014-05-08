<?php namespace App\Services\Validators;

class ArticleValidator extends Validator {

	public static $messages = [
			'title.required'	=> 'Please type in a title.',
			'title.regex'		=> 'Your title contains illegal characters.',
			'category.required'			=> 'Please select a category, so that people can find your post.',
			'category.regex'	=> 'Your category name may only contain letters, numbers, spaces, dashes (-) and underscores (_).'
	];

	public static $rules = [
		'title'		=> 'required|regex:/^[a-z0-9 .\-\_\(\)\&\%\"\'\?\!\#\/\=\´\`\£\$\€\,\:\+]+$/i',
		'category'		=> 'required|regex:/^[a-z0-9 .\-\_]+$/i'
	];
}