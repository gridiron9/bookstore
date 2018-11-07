<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $books = factory(App\Models\Book::class, 5)->create();
        $author = factory(App\Models\Author::class,5)->create();
        $customer = factory(App\Models\Customer::class,5)->create();
        $genre = factory(App\Models\Genre::class,5)->create();
        //$users = factory(App\User::class,5);
        $this->call([
            BooksGenresTableSeeder::class,
            BooksAuthorsTableSeeder::class,
            BooksCustomersTableSeeder::class
        ]);
    }
}
