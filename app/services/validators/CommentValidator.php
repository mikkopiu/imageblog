<?php namespace App\Services\Validators;

class CommentValidator extends Validator {

	public static $rules = [
		'commenter'		=> 'required',
		'body'			=> 'required'
	];
}