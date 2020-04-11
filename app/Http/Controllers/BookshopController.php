<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookshop;
use App\Book;
use App\Genre;



class BookshopController extends Controller
{
    public function index()
    {
        $bookshops = Bookshop::orderBy('name', 'asc')->get();
        return view('bookshops.index', compact('bookshops'));
    }

    public function show($id)
    {
        $bookshop = Bookshop::findOrFail($id);
        $books = Book::orderBy('title', 'asc')->get();
        
        return view('bookshops.show', compact('bookshop', 'books'));
    }

    public function create()
    {
        return view('bookshops.create');
    }
    //update database with new bookshop
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'city' => 'required|max:255'
        ]);
        $bookshop       = new Bookshop;
        $bookshop->name = $request->input('name');
        $bookshop->city = $request->input('city');
        $bookshop->save();
        session()->flash('success_message', 'Bookshop saved!');
        return redirect()->action('BookshopController@index');
    }

    public function addBook(Request $request, $id)
    {
        $bookshop = Bookshop::findOrFail($id);
        $book     = $request->input('book_id');
        $count    = $request->input('count');

        if($bookshop->books()->find($book) === null) {
//   this is the method we defined in the model!
//                  vvv
        $bookshop->books()->attach($book, ['count' => $count]); // now we have attached the book that we selected from the ID and connects it to the bookshop ID
                            //the second paramenter is an array with the name of the column and then the value for it
        }
        //this is the same as
        //        $bookshop->books()->synchWithoutDetaching($book); 


      //   return $bookshop->books;//will give us all the books that are associated with the bookshop
                                //here we dont need () on the books because eloquent 
                //this is the same as 
                            // return $bookshop->books()->get;
        //return $bookshop->books()->where('id', '<', 5)->get; // would give us books with an ID of 5 or less
        // return $bookshop->books()->where('id', '<', 5)->toSql();  //will give us the SQL query!!!

        else {
            /*     //can be done like this but this will make it so a new ADD will rewrite the current amount 

            $bookshop->books()->detach($book);
            $bookshop->books()->attach($book, ['count' => $count]);
            */ 
            //or like this to make it so when you press ADD you are just adding the total count
            $oldCount = $bookshop->books()->find($book)->pivot->count;
            $count = $oldCount + $count;
            $bookshop->books()->updateExistingPivot($book, ['count' => $count]);
        }


        //every relationship is defined as object
        return redirect()->action('BookshopController@show', $bookshop->id);
    }

    public function removeBook(Request $request, $id)
    {
        $bookshop = Bookshop::findOrFail($id);
        $book     = $request->input('book_id');
        $bookshop->books()->detach($book); 
        return redirect()->action('BookshopController@show', $bookshop->id);
    }


}
