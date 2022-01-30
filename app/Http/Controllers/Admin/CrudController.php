<?php

namespace App\Http\Controllers\Admin;

use App\Actions\File\File;
use App\Models\Crud;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CrudRequest;

class CrudController extends Controller
{
    public function index()
    {
        return view('Backend.crud.index');
    }

    public function getAllData()
    {
        return Crud::latest()->get();
    }
    function store(CrudRequest $request)
    {
        $crud =  Crud::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => File::upload($request->file('image'), 'crud')
        ]);
        if ($crud) {
            return true;
        }
    }
}
