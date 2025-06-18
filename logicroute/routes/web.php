<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
Route::get('/', function () {
    return view('welcome');
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

// User Routes
Route::get('users/roles', [UserController::class, 'roles_index'])->name('users-roles-index');