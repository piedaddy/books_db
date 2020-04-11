<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookshop extends Model
{
    protected $table="bookshops";

    protected $fillable = [
        'name',
        'city'
    ];

    public function books()
    {
                                                //name of the table
        return $this
                    ->belongsToMany(Book::class, 'book_bookshop')
                    ->withPivot(['count']); // array of the values that we want to use
    }
}
