<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0;$i < 5; $i++) {
            DB::table('books_genres')->insert([
                'book_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'genre_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        }
    }
}
