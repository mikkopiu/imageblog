<?php namespace App\Services\Validators;

class CommentValidator extends Validator {

	public static $messages = [
		'commenter.required'	=> 'Please type in your name.',
		'commenter.alpha_num'	=> 'Your name may only contain letters and numbers',
		'body'					=> 'Please type in your comment.'
	];

	public static $rules = [
		'commenter'		=> 'required|alpha_num',
		'body'			=> 'required'
	];
}