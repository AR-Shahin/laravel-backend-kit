<?php

use App\Http\Controllers\Admin\{
    AdminController,
    CrudController,
    DashboardController,
    PermissionController,
    ProfileController,
    RoleController
};

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->as('admin.')->middleware(['auth:admin'])->group(function () {

      # Admin
    Route::controller(AdminController::class)->group(function() {
        Route::get('/', 'index');

    });

    # Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(CrudController::class)->name('crud.')->prefix('crud')->group(function () {

        Route::get('get-all-data', 'getAllData')->name('get-all-data');
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::delete('{crud}', 'destroy')->name('destroy');
        Route::get('{crud}', 'show')->name('view');

        Route::post('{crud}', 'update')->name('update');
    });

    Route::controller(ProfileController::class)->name('profile')->prefix('profile')->group(function() {
        Route::get('/', 'index');
        Route::post('/update', 'update')->name('.update');
    });

    # Permission
    Route::controller(PermissionController::class)->name('permission.')->prefix('permission')->group(function() {
        Route::get('/', 'index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::delete('/delete/{permission}', 'delete')->name('delete');
    });

    # Role
    Route::controller(RoleController::class)->name('role.')->prefix('role')->group(function() {
        Route::get('/', 'index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::delete('/delete/{role}', 'delete')->name('delete');
    });

});



