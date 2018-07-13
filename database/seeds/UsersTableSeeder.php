<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'Jorge', 
        	'email'=>'jservingo@gmail.com', 
        	'password'=>bcrypt('castalia'),
            'admin' => true
        ]);
        User::create([
        	'name'=>'JSG', 
        	'email'=>'jsg@gmail.com', 
        	'password'=>bcrypt('castalia')
        ]);
    }
}
