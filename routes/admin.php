<?php

use App\Http\Controllers\Admin\CrudController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->as('admin.')->middleware(['auth:admin'])->group(function () {

    # Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('crud', CrudController::class)->except('create');
});
