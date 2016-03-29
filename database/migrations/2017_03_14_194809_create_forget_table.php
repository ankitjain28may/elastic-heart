<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('forget', function(Blueprint $table) {
            $table->increments('id');
            $table->string('soc_email');
            $table->string('token');
            $table->foreign('soc_email')->references('email')->on('society')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forget');
    }
}
