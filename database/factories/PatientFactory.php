<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'dni' => $faker->randomNumber(8,true),
        'firstname' => $faker->firstName,
        'othername' => $faker->firstName,
        'surname' => $faker->lastName,
        'lastname' => $faker->lastName,
        'code' => $faker->randomNumber(8,true),
        'hosp_origin' => $faker->randomNumber(1,true),
    ];
});
