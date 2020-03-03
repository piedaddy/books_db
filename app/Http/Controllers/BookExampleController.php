<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Book;
use DB;
use App\Publisher;
use App\Genre;
use App\Review;


class BookExampleController extends Controller
{
    public function index() 
    {
        $books = Book::all();
        $genre = Genre::all();
        $view = view('books.index', compact('books', 'genre'));
             // same as books/index
        return $view;
    }


    public function show($id)
    {
        $book = Book::find($id);
        // $reviews = Review::findOrFail($id);
       // $publisher = Publisher::find($book->publisher_id);

       //return $book->publisher->books;
            // will give us all the books where the publisher id is equal to the publisher id
        $view = view('books.show', compact('book'));
        return $view;
    }

    public function create()
    {
        $publishers= Publisher::all(); 
        $genres = Genre::all();
        return view('books.create', compact('publishers'));
    }


    public function store(Request $request)
    {
        $b = new Book;
        $b->title = $request->input('title');
        $b->authors = $request->input('author');
        $b->image = $request->input('image');
        $b->publisher_id= $request->input('publisher_id');
        $b->save();
    }



    public function edit($id)
    {
        $book = Book::find($id);
        $publishers = Publisher::all();
        $genres = Genre::all();
        return view('books.edit', compact('book', 'publishers', 'genres'));
    }


    public function update(Request $request, $id)
    {
        $book = Book::find($id); 
        $book->title = $request->input('title');
        $book->authors = $request->input('author');
        $book->image = $request->input('image');
        $book->genre_id=$request->input('genre_id');
        $book->publisher_id= $request->input('publisher_id');
        $book->save();

        return redirect('/books/show/'.$book->id); // this is so that the url will change, and the form wont be resubmitted if the user refereshes
    }

    public function delete($id)
    {
        $book = Book::find($id); 
        $book->delete();

        return redirect('/books/index');
    }


    public function review(Request $request, $book_id)
    {
        $this->validate($request, [
            'review' => 'required|max:255',
            'name' => 'required',
        ]); 
        $review = new Review;

        $review->review = $request->input('review');
        $review->name = $request->input('name');
        $review->book_id = $book_id;          
        $review->save();
        session()->flash('success_message', 'Review saved!');
        return redirect('/books/show/'.$book_id);
        // return redirect()->action('BookExampleController@show', $book_id);
    
    }
}
