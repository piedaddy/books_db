<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Review extends Model
{
   // protected $fillable = ['name', 'email', 'review']; //this means that i can fill it in with mass assignment
   // protected $guarded = ['id', 'created_at', 'updated_at']; //now no one could mess with these dates, couldn't do mass assignment, everything except what is listed here can be filled in
    
    //OR LIKE this
    protected $guarded = []; /// allows mass filling of everything, so everything can be filled
    
    public function book() 
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
