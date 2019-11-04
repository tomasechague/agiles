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
        # Lets create 150 random Profiles
        $profiles = factory(\App\Profile::class, 15)->create([
            'user_id' => $this->getRandomUserId(),
        ]);
    }

    private function getRandomUserId() {
        $user = \App\User::inRandomOrder()->first();
        return $user->id;
    }
