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
         $users = factory(App\User::class, 15)->create();

         \App\User::insert([
            'address' => 'John Doe',
            'country' => 'AR',
            'province' => 'Buenos Aires',
            'postalCode' => 1900,
            'lesson' => 'matematica',
            'is_teacher' => 1,
            'user_id' => 1,
            'lat' => 'john@doe.com',
            'lng' => 'john@doe.com'
        ]);

        \App\User::insert([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com'
        ]);
    }
}
