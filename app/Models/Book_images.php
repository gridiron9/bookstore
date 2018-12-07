<?php

namespace App;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class Book_images extends Model
{
    public function book(){
        return $this->belongsTo(Book::class);
    }
    protected $fillable = ['book_id','img_path'];
}
