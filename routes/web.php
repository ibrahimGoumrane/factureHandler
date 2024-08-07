<?php

use App\Http\Controllers\AuthUser;
use App\Http\Controllers\RegistredUserController;
use Illuminate\Support\Facades\Route;

//Route to the home page
Route::view('/', 'homeNotLoggedIn/index')->name('home');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/caisse', [\App\Http\Controllers\CaisseController::class, 'index'])->name('caisse.index');
    Route::get('/caisse/create', [\App\Http\Controllers\CaisseController::class, 'create'])->name('caisse.create');
    Route::post('/caisse', [\App\Http\Controllers\CaisseController::class, 'store'])->name('caisse.store');
});

//Controller used to log in and log out
Route::middleware('guest')->group(function () {
        Route::controller(RegistredUserController::class)->group(function () {
            Route::get('/register', 'create')->name('register');
            Route::post('/register', 'store');
        });
        Route::controller(AuthUser::class)->group(function () {
            Route::get('/login', 'create')->name('login');
            Route::post('/login', 'store');
            Route::delete('/logout','destroy');
        });
});
