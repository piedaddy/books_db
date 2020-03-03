<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Genre extends Model
{
    
    public function books() 
    { //one genre can have many books
        return $this->hasMany(Book::class);
        //tells laravel to find genre.id inside book, and not a book id inside genre

    }
}
