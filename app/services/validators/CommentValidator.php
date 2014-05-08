<?php namespace App\Services\Validators;

class CommentValidator extends Validator {

	public static $messages = [
		'commenter.required'	=> "Please type in a name, so people know it's you.",
		'commenter.alpha_num'	=> 'Your name may only contain letters and numbers.',
		'body.required'			=> 'Please type in your comment.',
		'body.regex'			=> 'Your comment contains illegal characters, please fix that.'
	];

	public static $rules = [
		'commenter'		=> 'required|alpha_num',
		'body'			=> 'required|regex:/^[a-z0-9 .\-\_\(\)\&\%\"\'\?\!\#\/\=\´\`\£\$\€\,\:\+]+$/i'
	];
}