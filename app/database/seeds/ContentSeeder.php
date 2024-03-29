<?php

use App\Models\Article;
use App\Models\Page;
use App\Models\Comment;
use App\Models\Category;

class ContentSeeder extends Seeder {

	public function run()
	{
		// Using truncate function so all info will be cleared when re-seeding.
		DB::table('articles')->truncate();
		DB::table('pages')->truncate();

		Article::create(array(
			'title'   => 'First post',
			'slug'    => 'first-post',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'user_id' => 1,
			'category_id'=> '1',
			'created_at' => Carbon\Carbon::now()->subWeek(),
			'updated_at' => Carbon\Carbon::now()->subWeek(),
		));
		Article::create(array(
			'title'   => '2nd post',
			'slug'    => '2nd-post',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'user_id' => 1,
			'category_id'=> '1',
			'created_at' => Carbon\Carbon::now()->subDay(),
			'updated_at' => Carbon\Carbon::now()->subDay(),
		));
		Article::create(array(
			'title'   => 'Third post',
			'slug'    => 'third-post',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'user_id' => 1,
			'category_id'=> '2',
			'created_at' => Carbon\Carbon::now()->subDay(),
			'updated_at' => Carbon\Carbon::now()->subDay(),
		));

		Page::create(array(
			'title'   => 'Welcome',
			'slug'    => 'welcome',
			'body'    => 'Welcome to the site',
			'user_id' => 1,
		));
		Page::create(array(
			'title'   => 'About us',
			'slug'    => 'about-us',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'user_id' => 1,
		));
		Page::create(array(
			'title'   => 'Contact',
			'slug'    => 'contact',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'user_id' => 1,
		));

		Comment::create(array(
			'commenter'   => 'Contact',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'article_id' => 1,
		));
		Comment::create(array(
			'commenter'   => 'Contact',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'article_id' => 1,
		));
		Comment::create(array(
			'commenter'   => 'Contact',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'article_id' => 1,
		));
		Comment::create(array(
			'commenter'   => 'Contact',
			'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'article_id' => 1,
		));

		Category::create(array(
			'category'   => 'Cats'
		));
		Category::create(array(
			'category'   => 'Dogs'
		));
		Category::create(array(
			'category'   => 'Sceneries'
		));
	}

}