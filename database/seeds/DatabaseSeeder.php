<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    See the problem??
    {
    	DB::table('society')->insert([
    		'soc_name' => 'Nibble',
           'email' => 'hello@hackncs.com',
    		'password' => Hash::make('secret'),
    		'privilege' => 9,
            'username' => 'nibble'
    	]);
    }
}
