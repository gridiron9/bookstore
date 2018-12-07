<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use CrudTrait;
    use SoftDeletes;

    public function books(){
        return $this->belongsToMany(Book::class,'books_authors');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class,'authors_genres');
    }

    protected $fillable = ['about','name','birthday','deathday','profession','website','country'];
}
