<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Genre::class,function (Faker $faker){
    return [
        'name' => $faker->name,
        'info' => $faker->sentence($maxNbWords = 10),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        ];
    });
