<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0;$i < rand(2,7); $i++) {
            DB::table('books_authors')->insert([
                'book_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'author_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        }
    }
}
