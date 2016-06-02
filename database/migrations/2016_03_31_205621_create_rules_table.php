<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->length(10)->unsigned();
            $table->foreign('id')->references('id')->on('events')->onDelete('cascade'); 
            $table->string('rules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rules');
    }
}
