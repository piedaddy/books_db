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
        return view('genres.show', compact('genre', 'books'));
    }

    public function create()
    {
        $genre= Genre::all();
        return view('genres.create', compact('genre'));
        return redirect('/genres/index');
    }

    public function store(Request $request)
    {
        $g = new Genre; 
        $g->name = $request->input('title');
        $g->save();
        return redirect('/genres/index');

    }
}
