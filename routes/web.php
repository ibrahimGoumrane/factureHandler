<?php

use App\Http\Controllers\AuthUser;
use App\Http\Controllers\RegistredUserController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;

//Route to the home page
Route::view('/', 'homeNotLoggedIn/index')->name('home');
Route::view('/team', 'team/index')->name('team');
Route::get('/team', [\App\Http\Controllers\RegistredUserController::class, 'teamData'])->name('team');


Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/cellule', [\App\Http\Controllers\AdminController::class, 'cellule'])->name('admin.cellule');
Route::get('/admin/role', [\App\Http\Controllers\AdminController::class, 'role'])->name('admin.role');


///////////////need admin authorisation need to work on it
Route::post('/user/update/{id}', [\App\Http\Controllers\RegistredUserController::class, 'update'])->name('user.update');
Route::post('/user/delete/{id}', [\App\Http\Controllers\RegistredUserController::class, 'destroy'])->name('user.delete');
Route::post('/cellule/update/{id}', [\App\Http\Controllers\Cellule::class, 'update'])->name('cellule.update');
Route::post('/cellule/delete/{id}', [\App\Http\Controllers\Cellule::class, 'destroy'])->name('cellule.delete');
Route::post('/role/update/{id}', [\App\Http\Controllers\Role::class, 'update'])->name('role.update');
Route::post('/role/delete/{id}', [\App\Http\Controllers\Role::class, 'destroy'])->name('role.delete');



Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/caisse/upload/{id}', [\App\Http\Controllers\CaisseController::class, 'upload'])->name('caisse.upload');
    Route::get('/caisse/{year?}/{month?}', [\App\Http\Controllers\CaisseController::class, 'index'])->name('caisse.index');
    Route::get('/caisse/create', [\App\Http\Controllers\CaisseController::class, 'create'])->name('caisse.create');
    Route::get('/years', [YearController::class, 'getYears'])->name('year.getYears');
    Route::get('/years/{year?}', [YearController::class, 'index'])->name('year.index');
    Route::post('/caisse', [\App\Http\Controllers\CaisseController::class, 'store'])->name('caisse.store');
    Route::post('/caisse/update/{id}', [\App\Http\Controllers\CaisseController::class, 'update'])->name('caisse.update');
    Route::post('/caisse/delete/{id}', [\App\Http\Controllers\CaisseController::class, 'destroy'])->name('caisse.delete');
    Route::post('/profile_picture', [\App\Http\Controllers\RegistredUserController::class, 'update_profile'])->name('profile_picture.store');
    Route::post('/logout', [AuthUser::class, 'destroy'])->name('logout');
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
        });
});
