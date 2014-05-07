<?php namespace App\Models;

class Comment extends \Eloquent {

	protected $table = 'comments';

	public function article()
    {
        return $this->belongsTo('\App\Models\Article', 'article_id');
    }

}