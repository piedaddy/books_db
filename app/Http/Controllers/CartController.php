<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\CartItem;

class CartController extends Controller
{
    
    public function index()
    {
        $items = CartItem::all(); 
        return view('carts.index', compact('items'));
    }

//FOR THE GET METHOD::
    public function add($book_id)
    {
        $item = CartItem::where('book_id', $book_id)->first();
                        //look in CI for where these two values are the same
                        //if we use GET this gives us an array of an object, and then we'd have to iterate through it
                        //if we use FIRST we get the object itself

        if($item==null){ //checking to see if it exists or not, and if not it will make a new one, 
            $cart = new CartItem; 
            $cart->book_id = $book_id; // will grab number as parameter, and create new with book
            $cart->count = 1;
            $cart->save();
        } else { //and if it does exist it will just change the count 
           $item->count = $item->count +1;
           $item->save();
        }
        return redirect('/cart');

    }

//FOR POST METHOD::
    public function postAdd(Request $request)
    {
       $i= new CartItem;
       $i->book_id = $request->input('book_id');
       $i->count = 1;
       $i->save();
       return redirect('/cart');

    }



    //when link is clicked, a new class of cart will be made
    //when link clicked, this->book needs to be added to the cart index 

    // Create method add in CartController. This method will be creating new cart items. In the list of books (view returnd from index of your BookController) create next to each book also Add to Cart button. By clicking on this button new cart item will be created with the book_id set to "added" book. Default count of cart_item should be 1.




}
