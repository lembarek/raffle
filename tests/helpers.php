<?php

use App\Models\User;
use App\Models\Raffle;
use App\Models\Question;
use App\Models\Answer;
use App\Models\UserAnswer;
use App\Models\MultiChoice;

function createUser($overs = [], $limit=1)
{
    return factory(User::class, $limit)->create($overs);
}

function makeUser($overs = [])
{
    return factory(User::class)->make($overs);
}

function createRaffle($overs = [], $limit=1)
{
    return factory(Raffle::class, $limit)->create($overs);
}

function makeRaffle($overs = [])
{
    return factory(Raffle::class)->make($overs);
}

function createQuestion($overs = [], $limit=1)
{
    return factory(Question::class, $limit)->create($overs);
}

function makeQuestion($overs = [])
{
    return factory(Question::class)->make($overs);
}

function createAnswer($overs = [], $limit=1)
{
    return factory(Answer::class, $limit)->create($overs);
}

function makeAnswer($overs = [])
{
    return factory(Answer::class)->make($overs);
}

function createUserAnswer($overs = [], $limit=1)
{
    return factory(UserAnswer::class, $limit)->create($overs);
}

function makeUserAnswer($overs = [])
{
    return factory(UserAnswer::class)->make($overs);
}

function createMultiChoice($overs = [], $limit=1)
{
    return factory(MultiChoice::class, $limit)->create($overs);
}

function makeMultiChoice($overs = [])
{
    return factory(MultiChoice::class)->make($overs);
}

function login($user)
{
    return Auth::loginUsingId($user->id);
}

function logout($user)
{
    return Auth::logout($user);
}

/**
 * insert record in database
 *
 * @param  string  $table
 * @param  array   $record
 * @return record
 */
function haveInDatabase($table, array $record)
{
    $id = DB::table($table)->insertGetId($record);
    return DB::table($table)->find($id);
}
