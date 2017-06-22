<?php

use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Patient::class, function (Faker\Generator $faker) {

    $createdDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-1 years', '+1 month')->getTimestamp());

    return [
        'name'       => $faker->name,
        'email'      => $faker->unique()->safeEmail,
        'phone'      => $faker->phoneNumber,
        'age'        => $faker->numberBetween(40, 90),
        'gender'     => $faker->randomElement( array_keys(App\Patient::$genders) ),
        'surgeon_id' => $faker->numberBetween(1, 9),
        'created_at' => $createdDate->toDateTimeString()
    ];
});
