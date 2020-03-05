<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookshop;
use App\Book;


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
        return $request;
    }
}
