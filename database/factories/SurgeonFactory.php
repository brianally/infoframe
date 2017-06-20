<?php

use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Surgeon::class, function (Faker\Generator $faker) {

    $createdDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-1 years', '+1 month')->getTimestamp());

    return [
        'name'       => $faker->name,
        'email'      => $faker->unique()->safeEmail,
        'created_at' => $createdDate->toDateTimeString()
    ];
});
