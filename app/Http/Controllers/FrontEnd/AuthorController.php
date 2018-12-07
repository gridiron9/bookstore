<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function showauthor($id = null){
        $author =  Author::where('id',$id)->first();
        $soldBooks = $author->books;
        $nsolds = $this->numberOfSolds($soldBooks);
        $nbooks = count($author->books);
        $ratings = $this->ratingOfBooks($soldBooks);
        return view('pages.author',compact('author','nsolds','nbooks','ratings','soldBooks'));
    }
    public function numberOfSolds($soldBooks){
        $count = 0;
        foreach ($soldBooks as $soldBook){
            $count += $soldBook->solds;
        }
        return $count;
    }
    public function ratingOfBooks($nbooks){
        $ratings = 0;
        foreach ($nbooks as $nbook){
            $ratings += $nbook->rating;
        }
        return $ratings/count($nbooks);
    }
}
