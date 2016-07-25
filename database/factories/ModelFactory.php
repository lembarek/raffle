<?php

use App\Models\Raffle;
use App\Models\Question;

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

$factory->define(App\Models\Question::class, function ($faker) {
    $raffle = count(Raffle::all())? Raffle::all()->random() :createRaffle();
    return [
    'description' => $faker->text(),
    'raffle_id' => $raffle->id,
    'type' => $faker->randomElement(['multiple', 'qualitative', 'qantative']),
    ];
});

$factory->define(App\Models\MultiChoice::class, function ($faker) {
    $question = count(Question::all())? Question::all()->random() :createQuestion();
    return [
    'answer' => $faker->word(),
    'question_id' => $question->id,
    ];
});



