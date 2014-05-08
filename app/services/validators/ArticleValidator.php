<?php namespace App\Services\Validators;

class ArticleValidator extends Validator {

	public static $messages = [
			'title.required'	=> 'Please type in a title.',
			'title.regex'		=> 'Your title contains illegal characters.',
			'category'			=> 'Please select a category, so that people can find your post.'
	];

	public static $rules = [
		'title'		=> 'required|regex:/^[a-z0-9 .\-\_\(\)\&\%\"\'\?\!\#\/\=\´\`\£\$\€\,\:\+]+$/i',
		'category'		=> 'required'
	];
}