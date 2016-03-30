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
    		'soc_name' => serialize(array("abc"=>"cde","qwerty"=>"zxc")),
    		'email' => 'hello@30hackncs.com',
    		'password' => Hash::make('secret'),
    		'privilege' => 9,
            'username' => 'nibble123'
    		]);
        // $data = 

    }
}
