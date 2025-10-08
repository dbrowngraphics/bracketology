<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightClassListController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/tkd-registration', function () {
    return view('tkd.registration');
})->middleware('auth');

Route::get('/weight-class-list', [WeightClassListController::class, 'index'])
    ->middleware('auth')
    ->name('weight-class.index');

require __DIR__ . '/auth.php';
