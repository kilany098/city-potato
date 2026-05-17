<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\UsersController;


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('users')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::post('/create', [UsersController::class, 'store'])->name('users.create');
            Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
            Route::put('/update/{id}', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');
        });
    });
});
