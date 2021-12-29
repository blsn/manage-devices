<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses' => '\App\Http\Controllers\PagesController@index',
    'as' => 'index'
]);

Route::get('/about', [
    'uses' => '\App\Http\Controllers\PagesController@about',
    'as' => 'about'
]);

Route::get('/services', [
    'uses' => '\App\Http\Controllers\PagesController@services',
    'as' => 'services'
]);

Route::get('/tasks', [
    'uses' => '\App\Http\Controllers\PagesController@tasks',
    'as' => 'tasks'
]);
