<?php
namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;

trait DatabaseSeed {

    use DatabaseMigrations {
        runDatabaseMigrations as baseRunDatabaseMigrations;
    }

    /**
     * hooks to run migration AND SEED the db after each test
     *
     * @desc    The DatabaseMigrations trait does not seed the database
     *          after the first migration. Consequently, and required seed
     *          data will not be included for subsequent tests.
     *
     * @link    https://stackoverflow.com/questions/42350138/how-to-seed-database-migrations-for-laravel-tests#42350139
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        $this->baseRunDatabaseMigrations();
        $this->artisan('db:seed');
    }
}
