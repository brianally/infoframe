<?php

use Illuminate\Database\Seeder;

class SurgeonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		$instances = 10;

        DB::table('surgeons')->delete();

        factory(App\Surgeon::class, $instances)->create();

        $this->command->info("seeded ${instances} surgeons");
    }
}
