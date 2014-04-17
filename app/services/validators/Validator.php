<?php namespace App\Services\Validators;

abstract class Validator {

	// Will contain input data to be validated
	protected $data;

	// Stores errors
	public $errors;

	// Stores given rules (defined in extended classes)
	public static $rules;

	public function __construct($data = null)
	{
		$this->data = $data ?: \Input::all();
	}

	public function passes()
	{
		$validation = \Validator::make($this->data, static::$rules);

		if ($validation->passes()) return true;

		$this->erros = $validation->messages();

		return false;
	}
}