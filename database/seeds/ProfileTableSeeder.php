<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Profile::insert([
            'address' => '34 Nº1019',
            'country' => 'AR',
            'province' => 'Buenos Aires',
            'postalCode' => 1900,
            'lesson' => 'matematica',
            'is_teacher' => 1,
            'user_id' => 1,
            'lat' => -34.910187,
            'lng' => -57.975353
        ]);

        \App\Profile::insert([
            'address' => '69 y 117',
            'country' => 'AR',
            'province' => 'Buenos Aires',
            'postalCode' => 1900,
            'lesson' => 'matematica',
            'is_teacher' => 1,
            'user_id' => 2,
            'lat' => -34.919565,
            'lng' => -57.922814
        ]);
        \App\Profile::insert([
            'address' => '34 Nº1019',
            'country' => 'AR',
            'province' => 'Buenos Aires',
            'postalCode' => 1900,
            'lesson' => 'matematica',
            'is_teacher' => 1,
            'user_id' => 2,
            'lat' => -34.910187,
            'lng' => -57.975353
        ]);
        \App\Profile::insert([
            'address' => '34 Nº1019',
            'country' => 'AR',
            'province' => 'Buenos Aires',
            'postalCode' => 1900,
            'lesson' => 'matematica',
            'is_teacher' => 1,
            'user_id' => 3,
            'lat' => -34.910187,
            'lng' => -57.975353
        ]);
        \App\Profile::insert([
            'address' => '34 Nº1019',
            'country' => 'AR',
            'province' => 'Buenos Aires',
            'postalCode' => 1900,
            'lesson' => 'matematica',
            'is_teacher' => 1,
            'user_id' => 1,
            'lat' => -34.910187,
            'lng' => -57.975353
        ]);
    }

    private function getRandomUserId() {
        $user = \App\User::inRandomOrder()->first();
        return $user->id;
    }
