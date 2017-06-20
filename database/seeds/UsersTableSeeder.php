<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

	      DB::table('users')->insert([
		        'name'           => 'Default User',
		        'email'          => 'default@test.net',
		        'password'       => bcrypt('default'),
		        'remember_token' => str_random(10)
	      ]);

      	$this->command->info('created default user');
    }
}
