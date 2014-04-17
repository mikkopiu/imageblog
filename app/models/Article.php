<?php namescape App\Models;

class Article extends \Eloquent {

	protected $table = 'articles';

	public function author()
	{
		return $this->belongsTo('User');
	}
}