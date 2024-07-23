<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'dni' => $faker->randomNumber(8,true),
        'date_of_birth' => $faker->date('Y-m-d'),
        'sex' => $faker->randomElement(['Masculino', 'Femenino']),
        'age' => $faker->randomNumber(2,true),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'civil_status' => $faker->randomElement(['CASADO', 'SOLTERO', 'CONVIVIENTE', 'VIUDO', 'DIVORCIADO']),
        'instruction' => $faker->randomElement(['SECUNDARIA', 'PRIMARIA', 'SUPERIOR']),
        'ocupation' => $faker->randomElement(['NINGUNA', 'OTROS']),
        'condition' => $faker->randomElement(['NINGUNA', 'OTROS']),
        'last_job' => $faker->date('Y-m-d'),
        'hosp_origin' => $faker->randomNumber(1, true),
        'code' => $faker->randomNumber(8,true),
    ];
});
