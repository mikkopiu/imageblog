<?php namespace App\Models;

class Page extends \Eloquent {

	protected $table = 'pages';

	protected $softDelete = true;

	public function author()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

}