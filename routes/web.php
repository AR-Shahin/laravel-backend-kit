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


Route::get('des',function(){

    $departments = Department::get();
    $designations = Designation::get();
    return view('backend.crud.des',compact('designations','departments'));
});

Route::post('des/{des}',function(Request $request, Designation $des){

    $des->update(
        [
            "title" => $request->title,
            "department_id" => $request->department_id,
        ]
    );
    return back();
    return view('backend.crud.des',compact('designations','departments'));
})->name('des');

Route::post('d',function(Request $request){

    Designation::create(
        [
            "title" => $request->title,
            "department_id" => $request->department_id,
        ]
    );
    return back();
})->name('d');
