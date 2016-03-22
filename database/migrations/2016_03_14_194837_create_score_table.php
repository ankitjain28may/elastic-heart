<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('scores', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('event_id')->length(10)->unsigned();
        $table->integer('user_id')->length(10)->unsigned();
        $table->integer('score');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
    });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scores');
    }
}
