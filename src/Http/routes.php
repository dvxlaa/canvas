<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    // Stats routes...
    Route::get('/stats', 'StatsController@index');
    Route::get('/stats/{id}', 'StatsController@show');

    // Post routes...
    Route::get('/posts', 'PostController@index');
    Route::get('/posts/{id?}', 'PostController@show');
    Route::post('/posts/{id}', 'PostController@store');
    Route::delete('/posts/{id}', 'PostController@destroy');

    // Tag routes...
    Route::get('/tags', 'TagController@index');
    Route::get('/tags/{id?}', 'TagController@show');
    Route::post('/tags/{id}', 'TagController@store');
    Route::delete('/tags/{id}', 'TagController@destroy');

    // Topic routes...
    Route::get('/topics', 'TopicController@index');
    Route::get('/topics/{id?}', 'TopicController@show');
    Route::post('/topics/{id}', 'TopicController@store');
    Route::delete('/topics/{id}', 'TopicController@destroy');

    // Media routes...
    Route::post('/media/uploads', 'MediaController@store');
    Route::delete('/media/uploads', 'MediaController@destroy');

    // Settings routes...
    Route::get('/settings', 'SettingsController@show');
    Route::post('/settings', 'SettingsController@update');
});

// Catch-all routes...
Route::get('/{view?}', 'BaseController')->where('view', '(.*)')->name('canvas');
