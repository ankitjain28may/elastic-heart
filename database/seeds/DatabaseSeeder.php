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
    		'soc_name' => 'nibble',
    		'email' => 'hello@hackncs.com',
    		'password' => Hash::make('secret'),
    		'privilege' => 9,
            'username' => 'nibble123'
    		]);
        // $data = 

    }
}
