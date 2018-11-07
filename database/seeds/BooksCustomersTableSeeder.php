<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksCustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        for($i = 0;$i < rand(2, 5); $i++) {
            DB::table('books_customers')->insert([
                'book_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'customer_id' => $faker->numberBetween($min = 1, $max = App\Models\Author::all()->count()),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        }
    }
}
