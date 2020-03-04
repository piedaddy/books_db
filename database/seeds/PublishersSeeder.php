<?php

use Illuminate\Database\Seeder;
use App\Publisher;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE publishers');
        $source_file = storage_path('books.json'); //automatically generates path to the storage 
        $data = json_decode(file_get_contents($source_file), true);

        $publishers_by_name = Publisher::pluck('id', 'title')->toArray();
        foreach($data as $book_data){
            if (!isset($publishers_by_name[$book_data['publisher']])) {
                $publisher = new Publisher;
                $publisher->title = $book_data['publisher'];
                $publisher->save();
                $publishers_by_name[$book_data['publisher']] = $publisher->id;
                var_dump($publishers_by_name);
            }
        }



    }
}
