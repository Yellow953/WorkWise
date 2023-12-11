<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::prefix('/profile')->group(function () {
    Route::post('/update', [App\Http\Controllers\ProfileController::class, 'update']);
    Route::post('/save_password', [App\Http\Controllers\ProfileController::class, 'save_password']);
    Route::get('/deactivate', [App\Http\Controllers\ProfileController::class, 'deactivate']);
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
});

Route::prefix('/users')->group(function () {
    Route::get('/{user}/show', [App\Http\Controllers\UserController::class, 'show']);
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/{user}/update', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy']);
    Route::get('/{user}/download_cv', [App\Http\Controllers\UserController::class, 'download_cv']);
    Route::get('/new', [App\Http\Controllers\UserController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users');
});

Route::prefix('/companies')->group(function () {
    Route::get('/{company}/show', [App\Http\Controllers\CompanyController::class, 'show']);
    Route::get('/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit']);
    Route::post('/{company}/update', [App\Http\Controllers\CompanyController::class, 'update']);
    Route::get('/{company}/destroy', [App\Http\Controllers\CompanyController::class, 'destroy']);
    Route::get('/new', [App\Http\Controllers\CompanyController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\CompanyController::class, 'create']);
    Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies');
});

Route::prefix('/jobs')->group(function () {
    Route::get('/{job}/users', [App\Http\Controllers\JobController::class, 'users']);
    Route::get('/{job}/show', [App\Http\Controllers\JobController::class, 'show']);
    Route::post('/{job}/apply', [App\Http\Controllers\JobController::class, 'apply']);
    Route::get('/{job}/edit', [App\Http\Controllers\JobController::class, 'edit']);
    Route::post('/{job}/update', [App\Http\Controllers\JobController::class, 'update']);
    Route::get('/{job}/destroy', [App\Http\Controllers\JobController::class, 'destroy']);
    Route::get('/new', [App\Http\Controllers\JobController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\JobController::class, 'create']);
    Route::get('/', [App\Http\Controllers\JobController::class, 'index'])->name('jobs');
});

// logout
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'custom_logout'])->name('custom_logout');

// Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
