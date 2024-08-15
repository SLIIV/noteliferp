<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Categories;
use App\Models\Incomes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'GetDashboardInfo'])->name('dashboard');
    Route::delete('/dashboard/{category}', [DashboardController::class, 'destroyCategory'])->name('dashboard.category.destroy');
    Route::post('/dashboard/category', [DashboardController::class, 'storeCategory'])->name('dashboard.category.store');
    Route::post('/dashboard', [DashboardController::class, 'storeIncome'])->name('dashboard.income.store');
});


Route::get('/register', function () {
    return view('register');
});

require __DIR__.'/auth.php';
