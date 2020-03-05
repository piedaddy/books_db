<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Book;
use DB;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all(); 
        return view('genres.index', compact('genres'));
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        $books = Book::where('genre_id', $id)->get();
        return view('genres.show', compact('genre', 'books', 'id'));
    }

    public function create()
    {
        $genres= Genre::all();
        return view('genres.create', compact('genres'));
        return redirect('/genres/index');
    }

    public function store(Request $request)
    {
        $g = new Genre; 
        $g->name = $request->input('name');
        $g->save();
        return redirect('/genres/index');

        if($bookshop->books()->find($book) === null) {
            //   this is the method we defined in the model!
            //                  vvv
                    $bookshop->books()->attach($book); // now we have attached the book that we selected from the ID and connects it to the bookshop ID
                    }
    }
}
