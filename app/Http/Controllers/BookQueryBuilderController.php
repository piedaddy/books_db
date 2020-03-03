<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book;

class BookQueryBuilderController extends Controller
{
    public function index()
    {
        /*
        $query = DB::table('books')
                ->limit(10)
                ->orderBy('title', 'asc');
                

            $data = $query->get();

           $data = $data->toArray(); //to change it from a COLLECTION to an ARRAY
            dd($data);
            */
/////////////////////////////////////////////////////////////////////////////////////////////////////////
///THE SAME AS THIS
/////////////////////////////////////////////////////////////////////////////////////////////////////////
       /*
        $books = DB::table('books')
                ->limit(10)
                ->orderBy('title', 'asc')
                ->where('title', 'like', '%hunger%')
                ->pluck('authors', 'title')
                ->get();
        */

////////////////////////////////////////////////////////////////////////////////////////////////////////
///THE SAME AS THIS
/////////////////////////////////////////////////////////////////////////////////////////////////////////
       /*
        $books = Book::limit(10)
                ->orderBy('title', 'asc')
                ->where('title', 'like', '%hunger%')
                ->get();
        */

////////////////////////////////////////////////////////////////////////////////////////////////////////
///THE SAME AS THIS, although this is used just to simplify the syntax and make it look all preeeeeetty
/////////////////////////////////////////////////////////////////////////////////////////////////////////
       /*
        $books = Book::query()  
                ->limit(10)
                ->orderBy('title', 'asc')
                ->where('title', 'like', 'A%')
                ->get();
        */
        //these make collections
        //a collection is an object not an array that contains magical methods that allow it to be treated like an array


////////////////////////////////////////////////////////////////////////////////////////////////////////
///TO ADD PAGINATION
/////////////////////////////////////////////////////////////////////////////////////////////////////////
        $books = Book::query()  
        ->orderBy('title', 'asc')
        ->paginate(10); //will give us a new type of object
        //dd($books);
        return view('books.page', compact('books'));
    }
}
