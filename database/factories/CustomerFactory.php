<?php

use Faker\Generator as Faker;


$factory->define(\App\Models\Customer::class,function (Faker $faker){
    return [
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar' => $faker->imageUrl($width = 800, $height = 600),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
    ];
});