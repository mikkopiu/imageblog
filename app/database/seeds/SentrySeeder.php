<?php

use App\Models\User;

class SentrySeeder extends Seeder {

	public function run()
	{
		// Using truncate function so all info will be cleared when re-seeding.		
		DB::table('users')->truncate();
		DB::table('groups')->truncate();
		DB::table('users_groups')->truncate();

		Sentry::getUserProvider()->create(array(
			'email'       => 'admin@admin.com',
			'password'    => "admin",
			'first_name'  => 'Mikko',
			'last_name'   => 'Mallikas',
			'activated'   => 1,
		));
		Sentry::getUserProvider()->create(array(
			'email'       => 'user@admin.com',
			'password'    => "user",
			'first_name'  => 'Pentti',
			'last_name'   => 'Kallela',
			'activated'   => 1,
		));

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Admin',
			'permissions' => array('admin' => 1),
		));
		Sentry::getGroupProvider()->create(array(
			'name'        => 'User',
			'permissions' => array(
				'admin.articles'		=> 1,
				'admin.pages'			=> 1,
				'admin.categories'		=> 1,
				'admin.comments.store'	=> 1
			),
		));

		// Assign user permissions
		$adminUser  = Sentry::getUserProvider()->findByLogin('admin@admin.com');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admin');
		$adminUser->addGroup($adminGroup);

		$regUser  = Sentry::getUserProvider()->findByLogin('user@admin.com');
		$regGroup = Sentry::getGroupProvider()->findByName('User');
		$regUser->addGroup($regGroup);
	}

}