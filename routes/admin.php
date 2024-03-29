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
        Route::get('/', 'index')->name("index");
        Route::get('/create', 'create')->name("create");
        Route::post('/store', 'store')->name("store");
        Route::post('/edit', 'edit')->name("edit");
        Route::get('/delete', 'delete')->name("delete");

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
        Route::post('/update/password', 'updatePassword')->name('.update_password');
        Route::post('/update/profile', 'updateProfile')->name('.update_profile');
    });

    # Permission
    Route::middleware("authorized")->controller(PermissionController::class)->name('permission.')->prefix('permission')->group(function() {
        Route::get('/', 'index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{permission}', 'update')->name('update');
        Route::delete('/delete/{permission}', 'delete')->name('delete');
    });

    # Role
    Route::middleware("authorized")->controller(RoleController::class)->name('role.')->prefix('role')->group(function() {
        Route::get('/', 'index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{role}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{role}', 'update')->name('update');
        Route::delete('/delete/{role}', 'delete')->name('delete');
    });

});



