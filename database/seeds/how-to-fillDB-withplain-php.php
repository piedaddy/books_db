<?php
$source_file = __DIR__ . '/../../storage/books.json';

$data = json_decode(file_get_contents('$source_file'), true);


foreach($data as $book_data){
    DB::insert('
    INSERT INTO `books`
    (`publisher_id`, `title`, `authors`, `image`)
    VALUES
    (?,?,?,?)
    ', [
      0,
      $book_data['title'],
      $book_data['author'],
      $book_data['image']
    ]);

}