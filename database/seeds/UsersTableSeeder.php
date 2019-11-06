<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Tomas Echague',
            'email' => 'tomiechague@gmail.com',
            'password' => bcrypt('agiles123'),
        ]);
        \App\User::insert([
            'name' => 'Juan Pablo Alvarez',
            'email' => 'juampi.sm2@gmail.com',
            'password' => bcrypt('agiles123'),
        ]);
        \App\User::insert([
            'name' => 'Federico Giuliano',
            'email' => 'fedeg@gmail.com',
            'password' => bcrypt('agiles123'),
        ]);
        \App\User::insert([
            'name' => 'Maximiliano Rodriguez',
            'email' => 'maxiR@gmail.com',
            'password' => bcrypt('agiles123'),
        ]);
        \App\User::insert([
            'name' => 'Daniel Testa',
            'email' => 'danit@gmail.com',
            'password' => bcrypt('agiles123'),
        ]);
    }
}
