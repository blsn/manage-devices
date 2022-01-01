<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses' => '\App\Http\Controllers\PagesController@index',
    'as' => 'index'
]);

// Route::get('/about', [
//     'uses' => '\App\Http\Controllers\PagesController@about',
//     'as' => 'about'
// ]);

Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');

Route::get('/services', [
    'uses' => '\App\Http\Controllers\PagesController@services',
    'as' => 'services'
]);

Route::get('/tasks', [
    'uses' => '\App\Http\Controllers\PagesController@tasks',
    'as' => 'tasks'
]);

// Auth::logout();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

