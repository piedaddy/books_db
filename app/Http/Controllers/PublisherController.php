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

    }


}
