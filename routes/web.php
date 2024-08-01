<?php

use App\Http\Controllers\AuthUser;
use App\Http\Controllers\RegistredUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');


Route::controller(RegistredUserController::class)->group(function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});
Route::controller(AuthUser::class)->group(function () {
    Route::get('/login', 'create');
    Route::post('/login', 'store');
    Route::delete('/logout','destroy');
});
