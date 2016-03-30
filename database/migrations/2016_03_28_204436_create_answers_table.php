<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ques_id')->length(10)->unsigned();
            $table->foreign('id')->references('id')->on('questions')->onDelete('cascade'); 
            $table->integer('score');
            $table->string('answer', 1000);
            $table->integer('incorrect');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers');
    }
}
