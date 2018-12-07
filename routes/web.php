<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Input;


Route::get('/','PagesController@shows')->name('dashboard');
Route::get('books/{id?}','BookController@book')->name('books');
Route::get('search','BookController@search')->name('search');
Route::get('books/author_books/id={author_id?}','BookController@author')->name('author');
Route::get('books/genre_books/id={genre_id?}','BookController@genre')->name('genre');
Route::get('author/author-id={id?}','AuthorController@showauthor');
Route::get('books/get_books_by_ranges/value={range_value?}','BookController@getBooksByRange')->name('ranges');
Route::get('books/get_books_by_category/genreId={id?}','BookController@getBooksByGenre')->name('genre_category');

Auth::routes();


//Route::get('home', 'HomeController@index')->name('home');
//Route::get('cart',function (){
//    return view('pages.cart');
//});
