<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('event_des',1000);
            $table->string('soc_name');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->integer('society_id')->length(10)->unsigned();
            $table->foreign('society_id')->references('id')->on('society')->onDelete('cascade');
            $table->tinyInteger('type');
            $table->boolean('approve');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
   }
}
