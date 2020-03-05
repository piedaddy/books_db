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
Route::post('/books/search', 'BookExampleController@search');

Route::get('/books/index', 'BookExampleController@index');
Route::get('/books/create', 'BookExampleController@create');
Route::get('/books/show/{id}', 'BookExampleController@show');
Route::post('/books', 'BookExampleController@store')->middleware('auth'); 
Auth::routes();

Route::post('/review/{book_id}', 'ReviewController@store')->middleware('auth'); 
Route::delete('review/{id}', 'ReviewController@delete')->middleware('can:admin'); // allowing admins, can checks the gates, admin is the name of the gate
//PLAYGROUND DAY 32
Route::get('/books/{id}/edit', 'BookExampleController@edit');
Route::post('/books/{id}/edit', 'BookExampleController@update');
Route::get('/books/{id}/delete', 'BookExampleController@delete');

//MORNING WORKOUT DAY 37
Route::post('/books/review/{id}', 'BookExampleController@review');

//If i want to use a new controller for the reviews
// Route::post('/review/{book_id}', 'ReviewController@store')->middleware('auth'); 

//AFTERNOON DAY 37
Route::get('/books-qb', 'BookQueryBuilderController@index');






// STUFF FROM MORNING WORKOUT OF DAY 32
Route::get('/books/publishers', 'PublisherController@index');

//to have a form on a new page ... 
Route::get('books/publishers/create', 'PublisherController@create'); // has to go above otherwise the id one will pick up "create" and use it as its value
Route::get('/publishers/{publisher_id}', 'PublisherController@show');

Route::post('/publishers', 'PublisherController@store'); //gets and posts can have the same url


//PLAYGROUND DAY 32 
Route::get('/genres/index', 'GenreController@index');
Route::get('/genres/create', 'GenreController@create'); 
Route::post('/genres', 'GenreController@store');
Route::get('/genres/{id}', 'GenreController@show');



//MORNING WORKOUT DAY 33
Route::get('/cart', 'CartController@index');
Route::get('/cart/show/{id}', 'CartController@show');

Route::get('/cart/add/{book_id}', 'CartController@add');
Route::get('/cart/empty', 'CartController@empty');


//IF USING PUSH
Route::post('/cart/add/{book_id}', 'CartController@postAdd');

Route::get('/cart/delete/{id}', 'CartController@delete');

//SUBMITTING A FORM IS THE ONLY WAY TO SEND THINGS TO A SERVER THROUGH POST

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//DAY 39 morning workout 
Route::get('/bookshop/create', 'BookshopController@create');
Route::post('/bookshop/create', 'BookshopController@update');
Route::get('/bookshops', 'BookshopController@index');
Route::get('/bookshops/{id}', 'BookshopController@show');
Route::post('/bookshops/{id}/add-book', 'BookshopController@addBook');
Route::post('/bookshops/{id}/remove-book', 'BookshopController@removeBook')->middleware('can:admin');



