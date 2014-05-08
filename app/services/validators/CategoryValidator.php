<?php namespace App\Services\Validators;

class CategoryValidator extends Validator {

	public static $rules = [
		'category'		=> 'required'
	];
}