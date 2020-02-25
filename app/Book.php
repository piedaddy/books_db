<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books'; // this is helpful becuase you can change the name of the table we are using here! so if the name changes for s ome reason then you can just modify the name of the table here
}
