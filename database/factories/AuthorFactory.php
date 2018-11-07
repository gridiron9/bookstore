<?php

 use Faker\Generator as Faker;


 $factory->define(App\Models\Author::class,function (Faker $faker){
     return [
         'name' => $faker->name,
         'about' => $faker->sentence($maxNbWords = 10),
         'birthday' =>$faker->dateTime($max = 'now'),
         'deathday' => $faker->dateTime($max = 'now'),
         'profession' => $faker->jobTitle,
         'website' => $faker->domainName,
         'country' => $faker->country,
         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
     ];
 });
