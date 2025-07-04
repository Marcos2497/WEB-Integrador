<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Foods\FoodController;
use App\Http\Controllers\Barns\BarnController;
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Rutas para el controlador de usuarios
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'can:usuario'])->group(function () {
    Route::get('users/users/create', [UserController::class, 'users_create'])->name('users-users-create');
    Route::get('users/users', [UserController::class, 'users_index'])->name('users-users-index');
    Route::get('users/users/edit/{id}', [UserController::class, 'users_edit'])->name('users-users-edit');
    //Rutas para el controlador usuario y roles
    Route::get('users/roles', [UserController::class, 'roles_index'])->name('users-roles-index');
});

// Rutas para el controlador de alimentos
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'can:alimento'])->group(function () {
    //Rutas para el controlador de alimentos
    Route::get('food/foods', [FoodController::class, 'foods_index'])->name('food-foods-index');

    Route::get('food/foods/create', [FoodController::class, 'foods_create'])->name('food-foods-create');

    Route::get('food/foods/edit/{id}', [FoodController::class, 'foods_edit'])->name('food-foods-edit');

    Route::get('food/tipos', [FoodController::class, 'tipo_index'])->name('food-tipos-index');
});

// Rutas para el controlador de Barn(Galpon)
//Rutas para el controlador de galpon
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'can:galpon'])->group(function () {
    //Rutas para el controlador de Galpónes

    Route::get('barn/barns', [BarnController::class, 'barns_index'])->name('barn-barns-index');
    Route::get('barn/barns/create', [BarnController::class, 'barns_create'])->name('barn-barns-create');
    Route::get('barn/barns/edit/{id}', [BarnController::class, 'barns_edit'])->name('barn-barns-edit');
});
