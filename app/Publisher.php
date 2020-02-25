<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publishers'; 
    public function books() 
    { //one publisher can have many books
        return $this->hasMany(Book::class);
        //tells laravel to find publisher.id inside book, and not a book id inside publisher

    }
}
