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

    public function show(Crud $crud)
    {
        return $crud;
    }

    public function edit(Crud $crud)
    {
        return $crud;
    }

    public function destroy(Crud $crud)
    {
        $image = $crud->image;
        File::deleteFile($image);
        return $crud->delete();
    }
    public function update(CrudRequest $request, Crud $crud)
    {
        dd($request->file('image'));
        return $request->all();
        if ($request->has('file')) {

            $olgImage = $crud->image;
            info('okkkk');
            $crud =   $crud->update([
                'name' => $request->name,
                'slug' => $request->name,
                'image' => File::upload($request->file('image'), 'crud')
            ]);
            File::deleteFile($olgImage);
        } else {
            $crud =   $crud->update([
                'name' => $request->name,
                'slug' => $request->name
            ]);
        }

        if ($crud) {
            return true;
        } else {
            return false;
        }
    }
}
