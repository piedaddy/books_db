<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

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
        return view('genres.show', compact('genre'));
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }
}
