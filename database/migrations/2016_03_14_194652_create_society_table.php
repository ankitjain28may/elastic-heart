<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email');
            $table->tinyInteger('privilege');
            $table->string('password');
            $table->string('soc_name');
            $table->remembertoken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('society');
    }
}
