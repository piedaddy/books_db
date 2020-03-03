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
    $review->review = $request->input('review');
    $review->save();
    //send success message
    session()->flash('success_message', 'Review saved!');
    //redirect 
    return redirect('/books/show/'.$book_id);



///EASIER WAY TO FILL A METHOD
   /*
    $review = new Review;
    $review->book_id = $book_id;
    $review->fill([
      'name'=> $request->input('name'),
      'email'=> $request->input('email'),
      'review'=> $request->input('review')
    ]);

    //OR BY CREATING A STATIC METHOD OF THE MODEL(REVIEW)
      Review::create($request->only(['name', 'email', 'review']));

    //OR
      $data = [
        'book_id' = $book_id
      ]
      $data = array_merge($data, $request->only(['name', 'email', 'review']));
      Review::create($data);

    // 
      Review::create([
        'book_id' => $book_id,
        'name'=> $request->input('name'),
        'email'=> $request->input('email'),
        'review'=> $request->input('review')
      ]);

     // or like
       $review->fill([
          'name'=> $_REQUEST('name'),
          'email'=> $_REQUEST->input('email'),
          'review'=> $_REQUEST->input('review')
      ]);

    $review->fill($request->all()); //to get everything
    $review->fill($request->only(['name', 'email', 'review'])); // to get specifics 
    $reivew->fill($request->except(['password']));
   
    */ 
  }



}