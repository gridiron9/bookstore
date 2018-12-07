<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AuthorsGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0;$i < rand(2, 7); $i++) {
            DB::table('authors_genres')->insert([
                'author_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'genre_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        }
    }
}
