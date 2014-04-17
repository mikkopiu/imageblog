<?php namespace App\Services\Validators;

class PageValidator extends Validator {

	public static $rules = [
		'title'		=> 'required',
		'body'		=> 'required',
	];
}