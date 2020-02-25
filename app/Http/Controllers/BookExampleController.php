<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Book;
use DB;
use App\Publisher;

class BookExampleController extends Controller
{
    public function index() 
    {
        $books = Book::all();
        $view = view('books.index', compact('books'));
             // same as books/index
        return $view;
    }


    public function show($id)
    {
        $book = Book::find($id);
       // $publisher = Publisher::find($book->publisher_id);

       //return $book->publisher->books;
            // will give us all the books where the publisher id is equal to the publisher id
        $view = view('books.show', compact('book'));
        return $view;
    }

    public function create()
    {
        $publishers= Publisher::all(); 
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
        return view('books.edit', compact('book', 'publishers'));
    }


    public function update(Request $request, $id)
    {
        $book = Book::find($id); 
        $book->title = $request->input('title');
        $book->authors = $request->input('author');
        $book->image = $request->input('image');
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
}
