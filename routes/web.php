<?php

use App\Http\Controllers\OvertimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ThanksController;
use \App\Http\Controllers\StatisticController;


Route::view('/', 'welcome')->name('index');

Route::get('thanks', [ThanksController::class, 'index'])
    ->name('thanks');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('manager', 'manager')
    ->middleware(['auth', CheckRole::class . ':su'])
    ->name('manager');

Route::get('edit-manager/{id}', [UserController::class, 'show'])
    ->middleware(['auth', CheckRole::class . ':su'])
    ->name('edit-manager');

Route::view('department', 'department')
    ->middleware(['auth', CheckRole::class . ':su'])
    ->name('department');

Route::get('edit-department/{id}', [DepartmentController::class, 'show'])
    ->middleware(['auth', CheckRole::class . ':su'])
    ->name('edit-department');

Route::get('statistics', [StatisticController::class, 'index'])
    ->middleware(['auth', CheckRole::class . ':hr'])
    ->name('statistics');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
