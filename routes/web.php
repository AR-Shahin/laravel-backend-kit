<?php

use App\Models\Admin;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
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

Route::get('/test', function () {
    $admins = Admin::all();
    return view('backend.crud.test',compact('admins'));
});




# SummerNote Image Upload
Route::post('upload', function (Request $request) {
    $image = $request->file('file');
    $filename = uniqid() . '.' . $image->getClientOriginalExtension();
    $path = $image->storeAs('public/images', $filename);

    return response()->json([
        'url' => asset('storage/images/' . $filename),
    ]);
});
