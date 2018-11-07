<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use CrudTrait;
    use SoftDeletes;

    public function book(){
        return $this->belongsToMany(Book::class,'books_genres');
    }
    protected $fillable = ['id','name','info'];
}
