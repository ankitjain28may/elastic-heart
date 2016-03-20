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
    	DB::table('society')->insert([
    		'soc_name' => 'Nibble Computer Society',
    		'email' => 'hello@hackncs.com',
    		'password' => Hash::make('secret'),
    		'privilege' => 9,
            'username' => 'nibble'
    		]);
    }
}
