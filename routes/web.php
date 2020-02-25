<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/api/books', 'APIBookController@index');

//                          this is unique in project, it is the action

// Route::get('/books', 'BookController@index');

// Route::get('/booksORM', 'BookORMController@index');


//methods that are working with the same data info should be used in the same controller
// Route::get('/booksORM/{id}/review/{review_id}', 'BookORMController@show');
// now we've told it that it is going to find the data in a variable id
// the variables here aren't recognized by name, but by index
//so now the first parameter in the method show will be whatever value is in the place of {id}, and the second parameter will be the value of {review_id}


// Route::get('/booksORM/show/{id?}', 'BookORMController@show'); // the  ? makes it so that this parameter is optional
// //if i wanted to use this though i would have to comment out the last route

Route::get('/books/index', 'BookExampleController@index');
Route::get('/books/create', 'BookExampleController@create');
Route::get('/books/show/{id}', 'BookExampleController@show');
Route::post('/books', 'BookExampleController@store');

//PLAYGROUND DAY 32
Route::get('/books/{id}/edit', 'BookExampleController@edit');
Route::post('/books/{id}/edit', 'BookExampleController@update');
Route::get('/books/{id}/delete', 'BookExampleController@delete');






// STUFF FROM MORNING WORKOUT OF DAY 32
Route::get('/books/publishers', 'PublisherController@index');

//to have a form on a new page ... 
Route::get('books/publishers/create', 'PublisherController@create'); // has to go above otherwise the id one will pick up "create" and use it as its value
Route::get('/publishers/{publisher_id}', 'PublisherController@show');

Route::post('/publishers', 'PublisherController@store'); //gets and posts can have the same url


