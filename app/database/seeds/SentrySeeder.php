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

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Admin',
			'permissions' => array('admin' => 1),
		));

		// Assign user permissions
		$adminUser  = Sentry::getUserProvider()->findByLogin('admin@admin.com');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admin');
		$adminUser->addGroup($adminGroup);
	}

}