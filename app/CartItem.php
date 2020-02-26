<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //one cart can have one book, so it is one to one 
    public function book() 
    {
        return $this->belongsTo(Book::class);
    }
}
