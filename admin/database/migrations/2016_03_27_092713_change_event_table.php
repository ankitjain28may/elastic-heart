<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('events', function($table)
       {
        $table->boolean('active')->default(0);
    }); 
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('events', function($table)
       {
        $table->dropColumn(['active']);
    }); 

    }
}
