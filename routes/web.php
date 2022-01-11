<?php

// use App\Http\Controllers\Admin\UserController;
use Admin\UserController; // to shorten the others as well
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\PagesController::class, 'services'])->name('services');
/*
Route::group(['middleware' => 'auth', 'prefix' => 'tasks'], function() {
    Route::get('/', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks');
    Route::get('/create', [App\Http\Controllers\TasksController::class, 'create'])->name('create');
    Route::post('/create', [App\Http\Controllers\TasksController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [App\Http\Controllers\TasksController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [App\Http\Controllers\TasksController::class, 'update'])->name('update');
    // Route::get('/delete/{id}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('delete');
    Route::delete('/{id}', [\App\Http\Controllers\TasksController::class, 'destroy'])->name('tasks.delete');    
});
*/
Route::resource('tasks', '\App\Http\Controllers\TasksController')->middleware(['auth']);

// Auth::logout();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // dashboard

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('/users', UserController::class);
});
