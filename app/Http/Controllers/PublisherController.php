<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use DB;


class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        $view = view('publishers.index', compact('publishers'));
        return $view;
    }

    public function show($id)
    {
        $publisher = Publisher::find($id); 
      
        $books = DB::select('SELECT * FROM `books` WHERE `publisher_id` LIKE "'.$id.'"');
        //could also do 
          // $books = Book::where('publisher_id', $id)->get()
          //specifies name of the column and value

        $view = view('publishers.show', compact('publisher', 'books'));
        return $view;
    }

    public function create() 
    {
      return view('publishers.create');

    }


    public function store(Request $request) // Request is how we are telling laravael that the parameter is TYPE request, it is a class 
                                            // $request is a variable that will have all the informationa that comes from the browser as its value 
                                            // usually just needed in POST 
                                            // request gives you form info mostly 
                                            // we can see what we sent to the server
    {
      $p = new Publisher;  // create empty obect of type 'Publisher'
      $p->title = $request->       input('title'); // will give the value of the input title from the form 
  // this is the name of column    name of input
      $p->save(); // i have grabbed the object p and used the save method which saves it to the DB

    }

}
