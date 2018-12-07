<?php

use Faker\Generator as Faker;

$factory->define(App\Book_images::class, function (Faker $faker) {
    return [
        'book_id' => $faker->numberBetween($min = 1, $max = App\Models\Book::all()->count()),
        'img_path' => $faker->imageUrl($width = 270, $height = 390),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
    ];
});
