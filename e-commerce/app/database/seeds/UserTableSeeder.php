<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
// use Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
		// 	User::create([

		// 	]);
		// }
		DB::table('users')->delete();
		User::create(array(
			'username' => 'wibiaristama',
			'password' =>  Hash::make('aristamawibi'),
			'email'    => 'wibi@gmail.com',


			));
	}

}