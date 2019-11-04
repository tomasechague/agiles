<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->name,
        'country' => $faker->paragraph(1),
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});
