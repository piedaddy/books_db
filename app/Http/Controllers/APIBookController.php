<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class APIBookController extends Controller
{
    function index() {

        // $pageNum = $_GET['page'];

        // if (!isset($_GET['page'])){ 
        //     $pageNum = 0;
        // }

        // if (isset($_GET['page']) && 'page' <= 1){
        //     // return with offset 4

        //     LIMIT 4, 4 
        // }


        // if (isset($_GET['page']) && 'page' == x){
        //     $pageNum *= 4
        // LIMIT ('$pageNum'), 4
    

      
        $query = '
        SELECT *
        FROM `books`
        ';

            $querySelect = DB::select($query);
            var_dump($querySelect);
        }

}


