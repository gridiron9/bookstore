<?php

 use Faker\Generator as Faker;


 $factory->define(App\Models\Author::class,function (Faker $faker){
     return [
         'name' => $faker->name,
         'about' => $faker->sentence($maxNbWords = 10),
         'birthday' =>$faker->dateTime($max = 'now'),
         'deathday' => $faker->dateTime($max = 'now'),
         'profession' => $faker->jobTitle,
         'avatar' => $faker->imageUrl($width = 270, $height = 390),
         'website' => $faker->url,
         'country' => $faker->country,
         'facebook_page' => $faker->url,
         'twitter_page' => $faker->url,
         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
     ];
 });
