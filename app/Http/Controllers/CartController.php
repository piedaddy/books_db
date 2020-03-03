<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\CartItem;
use App\Publisher;
use DB;

class CartController extends Controller
{
    
    public function index()
    {
        $items = CartItem::all();
        return view('carts.index', compact('items'));
    }

    public function show($id)
    {
        $item = CartItem::findOrFail($id);
        return view('carts.show', compact('item', 'id'));
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
    // public function postAdd(Request $request, $book_id)
    // {

    // $i = CartItem::where('book_id', $book_id)->first();

    // if($i==null){ 
    //    $i= new CartItem;
    //    $i->book_id = $request->input('book_id');
    //    $i->count = 1;
    //    $i->save();
    // } else {
    //     $i->count = $i->count +1;
    //     $i->save();
    // }
    // return redirect('/cart');

    // }

    //when link is clicked, a new class of cart will be made
    //when link clicked, this->book needs to be added to the cart index 

    public function delete($id)
    {
        $item = CartItem::find($id);
        if($item->count > 1)
        {
            $item->count -= 1;
            $item->save();
            return redirect()->action('CartController@index');
        }
       else if($item->count === 1) {
         $item->delete();
        // DB::statement('TRUNCATE TABLE `cart_items`');
        return redirect()->action('CartController@index');
       }
    }

    public function empty()
    {
        DB::statement('TRUNCATE TABLE `cart_items`');
        return redirect()->action('CartController@index');

    }



}
