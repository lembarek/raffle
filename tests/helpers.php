<?php

use App\Models\User;
use App\Models\Raffle;

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
