<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    // return view('layouts.frontend_app');
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/admin_auth.php';
require __DIR__ . '/admin.php';
