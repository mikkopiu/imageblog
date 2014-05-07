<?php namespace App\Models;

use App\Models\Comment;

class Article extends \Eloquent {

	protected $table = 'articles';

	protected $softDelete = true;

	public function author()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function comments()
	{
		return $this->hasMany('\App\Models\Comment', 'article_id');
	}

}