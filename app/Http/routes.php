<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@home',
    ]);

    Route::get('/register', [
    'as' => 'register',
    'uses' => 'AuthController@register',
    ]);

    Route::post('/register', [
    'as' => 'register',
    'uses' => 'AuthController@postRegister',
    ]);

    Route::get('/login', [
    'as' => 'login',
    'uses' => 'AuthController@login',
    ]);

    Route::post('/login', [
    'as' => 'login',
    'uses' => 'AuthController@postLogin',
    ]);

    Route::group(['middleware' => ['auth']], function(){

        Route::get('/logout', [
            'as' => 'logout',
            'uses' => 'AuthController@logout',
            ]);

        Route::get('/raffle/create', [
            'as' => 'raffle.create',
            'uses' => 'RaffleController@create',
            ]);


        Route::post('/raffle/create', [
            'as' => 'raffle.store',
            'uses' => 'RaffleController@store',
            ]);


        Route::get('/question/create', [
            'as' => 'question.create',
            'uses' => 'QuestionController@create',
            ]);

        Route::post('/question/multiple', [
            'as' => 'question.store.multiple',
            'uses' => 'QuestionController@storeMultiple',
            ]);

        Route::post('/question/qualitative', [
            'as' => 'question.store.qualitative',
            'uses' => 'QuestionController@storeQualitative',
            ]);

        Route::post('/question/quantative', [
            'as' => 'question.store.quantative',
            'uses' => 'QuestionController@storeQuanttative',
            ]);


    });

});

