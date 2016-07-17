<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Raffle::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'mechanics' => $faker->name,
        'rules' =>  $faker->name,
        'prize' => $faker->numberBetween(100, 1000),
        'deadline' => $faker->date,
    ];
});
