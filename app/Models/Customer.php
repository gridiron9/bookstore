<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $fillable = ['id','full_name','email','avatar'];
    public function book(){
        return $this->belongsToMany(Book::class,'books_customers');
    }
}
