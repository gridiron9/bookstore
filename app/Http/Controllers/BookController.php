<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function book($id = null,$janra_id = null){
        if ($id == null){
            $genres = Genre::take(8)->get();
            $authors = Author::take(8)->get();
            $ranges = $this->getRanges();
            $books = Book::orderBy('solds','desc')->take(3)->get();
            $Books = Book::get();
            $position = request()->get('position');
            return view('pages.books',compact('genres','authors','ranges','books','Books','position'));
        }
        else{
            $book = Book::where('id',$id)->first();
            $BSbooks = Book::orderBy('solds','desc')->take(10)->get();
            $BSbooks = $this->uniqueBooks($BSbooks,$book);
            $genres = Genre::take(8)->get();
            $recommends1 = $this->recommend($book);
            if ($recommends1 != -1){
                 $recommends = $this->uniqueBooks($recommends1,$book);
            }
            else{
                $recommends = -1;
            }
            return view('pages.book',compact('book','relate','genres','BSbooks','recommends'));
        }
    }
    public function getRanges(){
        $books = Book::get();
        $ranges = array(array(),array(),array(),array());

        foreach ($books as $book){
            if ($book->discount){
                if((int)($book->price)*(1-$book->discount/100)<30){
                    array_push($ranges[0],$book);
                    continue;
                }
                else if((int)($book->price)*(1-$book->discount/100)<60){
                    array_push($ranges[1],$book);
                    continue;
                }
                else if((int)($book->price)*(1-$book->discount/100)<90){
                    array_push($ranges[2],$book);
                    continue;
                }
                else{
                    array_push($ranges[3],$book);
                    continue;
                }
            }
            else{
                if((int)($book->price)<30){
                    array_push($ranges[0],$book);
                    continue;
                }
                else if((int)$book->price<60){
                    array_push($ranges[1],$book);
                    continue;
                }
                else if((int)$book->price<90){
                    array_push($ranges[2],$book);
                    continue;
                }
                else{
                    array_push($ranges[3],$book);
                    continue;
                }
            }
        }
        return $ranges;
    }

    /**
     * @param $recommends1
     * @return mixed
     */
    public function uniqueBooks($recommends1,$book){
        $ids = array();
        array_push($ids,$book->id);
        $uniquerecommend = array();
            foreach ($recommends1 as $recommend) {
                if (!in_array($recommend->id, $ids)) {
                    array_push($ids, $recommend->id);
                    array_push($uniquerecommend, $recommend);
                }
             }
             return $uniquerecommend;
        }
    /**
     * @param $book
     * @return
     */
    public function recommend($book){
        $recommend = array();
        if ($book->genre->isNotEmpty()){
            foreach ($book->genre as $boo){
                foreach ($boo->book as $bo) {
                    array_push($recommend, $bo);
                }
            }
            return $recommend;
        }
        else{
            return -1;
        }
    }
    public function search(Request $request){
        $keyword = $request->input('book_name');
        $genres = Genre::take(8)->get();
        $authors = Author::take(8)->get();
        $ranges = $this->getRanges();
        $books = Book::orderBy('solds','desc')->take(3)->get();
        $Books = Book::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return view('pages.books', compact('Books','genres','authors','ranges','books'));
    }

    public function author($author_id){
        $genres = Genre::take(8)->get();
        $authors = Author::take(8)->get();
        $ranges = $this->getRanges();
        $books = Book::orderBy('solds','desc')->take(3)->get();

        $Books = Book::whereHas('authors', function($query) use ($author_id){
            return $query->where('author_id', $author_id);
        })->get();

        return view('pages.books',compact('books','genres','authors','ranges','Books'));
    }

    public function genre($genre_id){
        $genres = Genre::take(8)->get();
        $authors = Author::take(8)->get();
        $ranges = $this->getRanges();
        $books = Book::orderBy('solds','desc')->take(3)->get();
        $Books = Book::whereHas('genre', function($query) use ($genre_id){
            return $query->where('genre_id', $genre_id);
        })->get();

        return view('pages.books',compact('books','genres','authors','ranges','Books'));
    }

    public function getBooksByRange($range_value){
        $genres = Genre::take(8)->get();
        $authors = Author::take(8)->get();
        $ranges = $this->getRanges();
        $books = Book::orderBy('solds','desc')->take(3)->get();
        switch ($range_value){
            case 30:
                $Books = $ranges[0];
                break;
            case 60:
                $Books = $ranges[1];
                break;
            case 90:
                $Books = $ranges[2];
                break;
            case 100:
                $Books = $ranges[3];
                break;
        }

        return view('pages.books',compact('books','genres','authors','ranges','Books'));
    }

    public function getBooksByGenre($id){
        $genres = Genre::take(8)->get();
        $authors = Author::take(8)->get();
        $ranges = $this->getRanges();
        $books = Book::orderBy('solds','desc')->take(3)->get();
        $Books = Book::whereHas('genre', function($query) use ($id){
            return $query->where('genre_id', $id);
        })->get();

        return view('pages.books',compact('books','genres','authors','ranges','Books'));
    }
}
