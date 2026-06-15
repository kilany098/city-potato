<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\{
    UsersController,
    BannersController,
    BranchesController,
    CategoriesController,
    ContactsController,
    ExtrasController,
    MealsController,
    TablesController
};


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UsersController::class);
        Route::resource('banners', BannersController::class);
        Route::resource('branches', BranchesController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('extras', ExtrasController::class);
        Route::resource('meals', MealsController::class);
        Route::resource('tables', TablesController::class);
        Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
        Route::post('/contacts', [ContactsController::class, 'update'])->name('contacts.update');
    });
});
