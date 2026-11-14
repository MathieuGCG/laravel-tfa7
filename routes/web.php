<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::resource('customers', CustomerController::class)->except(['show', 'destroy']);
Route::resource('users', UserController::class)->except(['show', 'destroy']);