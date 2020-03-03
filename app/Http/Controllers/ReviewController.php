<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Review;


class ReviewController extends Controller
{
  public function store(Request $request, $book_id)
  {
    // we need to validate request
    // need to create new review (and add it to the right book)
    //send success message
    //redirect 

     // we need to validate request
     $this->validate($request, [
       'name' => 'required',
       'review' => 'required|max:255',
       'email' => 'required|email'
     ]);
    // need to create new review (and add it to the right book)
    $review = new Review;
    $review->book_id = $book_id;
    $review->name = $request->input('name');
    $review->email = $request->input('email');
    $review->reivew = $request->input('review');
    $review->save();
    //send success message
    session()->flash('success_message', 'Review saved!');
    //redirect 
    return redirect('/books/show/'.$book_id);


  }



}