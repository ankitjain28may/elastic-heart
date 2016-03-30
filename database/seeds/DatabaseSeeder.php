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
    {
    	DB::table('society')->insert([
    		'soc_name' => 'Nibble',
    		'email' => 'hello@hackncs.com',
    		'password' => Hash::make('secret'),
    		'privilege' => 9,
            'username' => 'nibble'
    	]);

        DB::table('society')->insert([
            'soc_name' => 'ace',
            'email' => 'ace@ace.com',
            'password' => Hash::make('secret'),
            'privilege' => 0,
            'username' => 'ace'
        ]);
    }
}
