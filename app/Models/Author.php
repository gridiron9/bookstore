<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use CrudTrait;
    use SoftDeletes;

    public function book(){
        return $this->belongsToMany(Author::class,'books_authors');
    }

    protected $fillable = ['about','name','birthday','deathday','profession','website','country'];
}
