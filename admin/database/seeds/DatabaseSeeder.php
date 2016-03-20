<?php

use Illuminate\Database\Seeder;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('admin')->insert([
    		'name' => 'Nibble Computer Society',
    		'email' => 'nibble',
    		'password' => Hash::make('secret'),
    		'level' => 9
    		]);
    }
}
