<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Book::class ,function (Faker $faker){
    return[
        'name' => $faker->name,
        'pro_year' => $faker->dateTime($max = 'now'),
        'solds' => $faker->numberBetween($min = 1,$max = 2010),
        'size' => $faker->numberBetween($min = 10,$max = 150),
        'pages' => $faker->numberBetween($min = 10,$max = 5000),
        'about' => $faker->sentence($nbWords = 10),
        'img_path' => $faker->imageUrl($width = 270, $height = 390),
        'language' => $faker->languageCode,
        'price' => $faker->numberBetween($min = 0, $min = 150),
        'discount' => $faker->numberBetween($min = 0, $max = 50),
        'cover' => $faker->randomElement($array = array('paperback', 'hardback')),
        'published_at' => $faker->dateTime($max = 'now'),
        'best_seller' => $faker->boolean($chanceOfGettingTrue = 50),
        'weight' => $faker->numberBetween($min = 100, $max = 5000),
        'edition' => $faker->numberBetween($min = 1,$max = 13),
        'rating' => $faker->numberBetween($min = 1,$max = 10),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
    ];
});