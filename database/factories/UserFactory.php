<?php

use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {

    $password    = $faker->password;
    $createdDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-1 years', '+1 month')
        ->getTimestamp());

    return [
        'name'                  => $faker->name,
        'email'                 => $faker->unique()->safeEmail,
        'password'              => $password,
        'password_confirmation' => $password,
        'created_at'            => $createdDate->toDateTimeString()
    ];
});
