<?php

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
use App\Models\Foo;

Route::get('/', function () {

    // return view('layouts.frontend_app');
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



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


Route::get('query',[CRUDController::class,'index']);

Route::post("media-upload",function(Request $request) {
    Foo::create([
        "name" => $request->name,
        "image" => $request->image,
    ]);

    return back();
})->name("media_upload");


Route::post("csv-upload",function(Request $request) {

    if ($request->has('csv')) {
        $csv = file($request->file('csv'));
        $chunks = array_chunk($csv, 1000);
        $path = resource_path('temp');
        foreach ($chunks as $key => $chunk) {
            $name = "/tmp{$key}.csv";
            file_put_contents($path . $name, $chunk);
        }

        $files = glob("$path/*.csv");
        $header = [];
        foreach ($files as $key => $file) {
            $data = array_map('str_getcsv', file($file));
            if ($key == 0) {
                $header = $data[0];
                unset($data[0]);
            }

            foreach ($data as $user) {
                $userData = array_combine($header, $user);

                Foo::create([
                    "name" => $userData["Name"],
                    "image" => $userData["Image"],
                ]);
            }

            unlink($file);
        }
        return "stored";
    }
    return $request;
})->name("csv_upload");



// public function importUsingChunk(Request $request)
// {
//     if ($request->has('csv')) {
//         $csv = file($request->file('csv'));
//         $chunks = array_chunk($csv, 1000);
//         $path = resource_path('temp');
//         foreach ($chunks as $key => $chunk) {
//             $name = "/tmp{$key}.csv";
//             file_put_contents($path . $name, $chunk);
//         }

//         $files = glob("$path/*.csv");
//         $header = [];
//         foreach ($files as $key => $file) {
//             $data = array_map('str_getcsv', file($file));
//             if ($key == 0) {
//                 $header = $data[0];
//                 unset($data[0]);
//             }

//             foreach ($data as $user) {
//                 $userData = array_combine($header, $user);

//                 User::create([
//                     "name" => $userData["Name"],
//                     "email" => $userData["Email"],
//                     "password" => $userData["Password"],
//                     "city" => $userData["City"],
//                 ]);
//             }

//             unlink($file);
//         }
//         return "stored";
//     }
//     return "please upload csv file";
// }
