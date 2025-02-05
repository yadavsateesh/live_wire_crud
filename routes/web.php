<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/', Counter::class);

/* Route::get('counter', function () {
    return view('home');
});

Route::get('user', function () {
    return view('user');
}); */
