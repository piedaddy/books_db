<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountColumnToBookBookshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_bookshop', function (Blueprint $table) {
            $table->integer('count')->default(0); //we have set a default value for the count when it is first added to the table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_bookshop', function (Blueprint $table) {
            $table->dropColumn('count');
        });
    }
}