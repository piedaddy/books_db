<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function index() 
    {   
        // $books = DB::select('SELECT * FROM `books`');
        // $name = 'Gaby';
        // $surname= 'JAods';

        // //BASIC
        // $view = view('books');
        //          //tells it to find that php file ('books' in this case) and then renders it in the browser
        // return $view;

        // //MORE...
        // $view = view('books')->with('user', $name)->with('surname', $surname);
        // //tells it to use the view using the variable name thats is conncected to that variable 
        // //or can do >with('name', 'Gaby')
        //     //tells it to use the view using the variable name thats value is set to Gaby
        // return $view;


        // //OR LIKE THIS 
        // $view = view('books')
        // ->with([
        //     'user'=> $name,
        //     'surname' =>$surname
        // ]);
        // //now that its an array, it creates the variables with the names of the key and the value will be the variable 
        // return $view;

        // //SHORTER!!
        // $view = view('books', [
        //     'user' => $name,
        //     'surname' => $surname
        // ]);
        // //making it so that the second parameter of the view is the array of variables








        //even SHORTER!! using COMPACT
        $user = 'Gabu';
        $surname= 'JAods'; //these just have to be defined earlier already
        $comment = "sjkjlsdfjdsljf klsdf";
        $books = DB::select('SELECT * FROM `books`');
        $age = 20;
        
        $view = view('books', compact('user','surname', 'comment','age', 'books'));
        //just provides names of variables you want, and then will create an associative array with the same key and objects
        return $view;
    }

}
//to grab data from DB and then show it using view