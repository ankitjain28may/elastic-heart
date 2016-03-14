<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('questions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->length(10)->unsigned();
            $table->string('question',1000);
            $table->string('answers',1000);
            $table->string('options',1000);
            $table->string('image');
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
        Schema::drop('questions');
    }
}
