<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->as('admin.')->group(function () {

    # Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
