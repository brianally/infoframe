<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		$this->command->info('seeding users');
        $this->call(UsersTableSeeder::class);

        $this->command->info('seeding surgeons');
        $this->call(SurgeonsTableSeeder::class);
    }
}
