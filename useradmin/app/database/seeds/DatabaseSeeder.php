<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Eloquent::unguard();
		$vader = DB::table('users')->insert([
				'username' => 'doctorv',
				'email' => 'dartv@deathstar.com',
				'password' => Hash::make('thedarkside'),
				'first_name' => 'Darth',
				'last_name' => 'Vader',
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

		 DB::table('users')->insert([
				'username' => 'goodsidesoldier',
				'email' => 'lightwalker@rebels.com',
				'password' => Hash::make('hesnotmydad'),
				'first_name' => 'Luke',
				'last_name' => 'Skywalker',
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

		  DB::table('users')->insert([
				'username' => 'greendemon',
				'email' => 'dancingsmallman@rebels.com',
				'password' => Hash::make('yodaIam'),
				'first_name' => 'Yoda',
				'last_name' => 'Unkown',
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);


		// $this->call('UserTableSeeder');
	}

}
