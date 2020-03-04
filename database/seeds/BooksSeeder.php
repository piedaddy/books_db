<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Publisher;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //we want to take the data from the JSON file
        /// put it into our database
        DB::statement('TRUNCATE TABLE books');
        DB::statement('TRUNCATE TABLE publishers');


        //we want to take the data from the JSON file
        $source_file = storage_path('books.json'); //automatically generates path to the storage 
        $data = json_decode(file_get_contents($source_file), true); //takes a stirng for its first argument and then the second will determine if it returns an array ??
                                                                 //if SECOND argument is TRUE, it decodes it as ASSOCIATIVE ARRAYS
                                                                 //if the SECOND argument is FALSE or nothing, it decodes it as OBJECTS

        /// put it into our database
        // foreach($data as $book_data){
        //     $book = new Book;
        //     /// would also work ::: Book::create()
        //     $book->authors = $book_data['author'];
        //     $book->title   = $book_data['title'];
        //     $book->image   = $book_data['image'];
        //     $book->save();
        //}

        $publishers_by_name = Publisher::pluck('id', 'title')->toArray();

        foreach ($data as $book_data) {

            if (!isset($publishers_by_name[$book_data['publisher']])) { // does this key of publisher exist already?
                $publisher = new Publisher;
                $publisher->title = $book_data['publisher'];
                $publisher->save();

                $publishers_by_name[$book_data['publisher']] = $publisher->id; // now 
            }
            //here i can be sure that the element with unique publisher exists 
            $book = new Book;
            $book->publisher_id = $publishers_by_name[$book_data['publisher']];
            $book->fill([
                'title' => $book_data['title'],
                'authors' => $book_data['author'],
                'image' => $book_data['image'],
            ]);
            $book->save();
        }

    }

}
