<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $fillable = ['id','name','pro_year','solds','pages','about','img_path','price','cover','published_at','best_seller','edition','weight','rating'];

    public function author(){
        return $this->belongsToMany(Author::class,'books_authors');
    }

    public function genre(){
        return $this->belongsToMany(Genre::class,'books_genres');
    }

    public function customer(){
        return $this->belongsToMany(Customer::class,'books_customers');
    }
}
