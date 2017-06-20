<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Surgeon::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail
    ];
});
