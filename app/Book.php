<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books'; // this is helpful becuase you can change the name of the table we are using here! so if the name changes for s ome reason then you can just modify the name of the table here

    //we want to define the relationship between the class and the model
    public function publisher() 
    {
        return $this->belongsTo(Publisher::class); // we say that there is a relaitoship between book and publisher
                                // you can put something else there
                                // publisher is sibling of book, so we don't need to specify it 
                                // ::class is just saying that this is a class
                                //is basically telling you the path 

    }

    //one book can have one genre
    public function genre()
    {
        return $this->belongsTo(Genre::class); 
    }

    public function cart()
    {
        return $this->belongsTo(CartItem::class);
    }


}
