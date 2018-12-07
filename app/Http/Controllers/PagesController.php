<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use DemeterChain\B;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function shows(){
        $booksNA = Book::orderBy('published_at','desc')->take(8)->get();
        $booksOS = Book::take(8)->get();
        $genres = Genre::take(8)->get();
        $booksBS = Book::orderBy('solds','desc')->take(8)->get();
        $BSAuthor = Author::find($this->getBestSellerAuthor());
        $BooksPB = Book::where('cover','paperback')->orderBy('solds','desc')->take(10)->get();
        return view('pages.index',compact('booksNA','booksOS','genres','booksBS','BSAuthor','BooksPB'));
    }
    public function getBestSellerAuthor(){
        $authors = Author::orderBy('id','asc')->get();
        $max = -5;
        foreach ($authors as $author){
            $count = 0;
            foreach ($author->books as $autho) {
                $count = $count + $autho->solds;
            }
            if ($max<$count){
                $max = $count;
                $id = $author->id;
            }
        }
        return $id;
    }
}
