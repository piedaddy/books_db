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
        ->with('publisher')//EAGER LOADING // looped through all books, created an array with all the IDs, then can run a single querry to find the publishers with these ids, and then by the id it assigns it to a specific property
                        // we had many books, each with a publsher ID
                        // so laravel selects the books, then creates an array, then it selects the necessary publishers for each element of the array, and then loops through them and assigns them to where it needs to be 
                        //more PHP, less mysql
                        // good for optimizing experience 
        ->with('reviews') // GIVE THE NAME OF THE RELATIONSHIP!!!!not the table or model!!! so we find this name though in the model
         ->paginate(100); //will give us a new type of object
        //dd($books);
        return view('books.page', compact('books'));
    }
}
