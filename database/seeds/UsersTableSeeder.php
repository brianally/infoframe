<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\User;

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

	      User::create([
		        'name'           => 'Default User',
		        'email'          => 'default@test.net',
		        'password'       => bcrypt('default'),
		        'remember_token' => str_random(10),
		        'created_at'     => Carbon::now()->format('Y-m-d H:m:i')
	      ]);

      	$this->command->info('created default user');
    }
}
