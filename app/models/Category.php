<?php namespace App\Models;

use App\Models\Article;

class Category extends \Eloquent {

	protected $table = 'categories';

	public function articles()
	{
		return $this->hasMany('\App\Models\Article');
	}

}