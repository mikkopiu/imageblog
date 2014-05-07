<?php namespace App\Services\Validators;

class ArticleValidator extends Validator {

	public static $rules = [
		'title'		=> 'required'
	];
}