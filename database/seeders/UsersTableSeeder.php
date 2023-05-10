<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //this is the creation of a demo data into the users table 
        DB::table('users')->insert([

            [
                //for the role of admin
                'name' => 'Admin',
                'username'=>'admin',
                'email' => 'admin@gmail.com',
                'password' => HASH::make('111'),
                'role' => 'admin',
                'status' => "active",

            ],
            [
                //for the role of agent 
                'name' => 'Agent',
                'username'=>'agent',
                'email' => 'agent@gmail.com',
                'password' => HASH::make('111'),
                'role' => 'agent',
                'status' => 'active',

            ],
            [
                //for the role of user
                'name' => 'User',
                'username'=>'user',
                'email' => 'user@gmail.com',
                'password' => HASH::make('111'),
                'role' => 'user',
                'status' => 'active',

            ],


        ]);
    }
}
