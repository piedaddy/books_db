<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookORMController extends Controller
{
    public function index() 
    {
        $books = Book::all(); //this says to select all the objects of Book that the array of objects $books has 
        return $books;
    }

    public function show($id)  // we are grabbing the parameter from the URL by putting it as a parameter in the method!!!!
    {
        $book = Book::find($id);
        $book = Book::findOrFail($id); // this will make it so you get a 404 in case it cannot find the variable 
        return $book;
    }


    //EXAMPLE of OPTIONAL PARAMTER
            // public function show($id =1);  // optional parameter
            // {
            //     $book = Book::find($id);
            //     return $book;
            // }
}
