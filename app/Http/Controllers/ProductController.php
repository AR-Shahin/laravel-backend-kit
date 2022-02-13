<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Actions\File\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $data = Product::latest()->get();
            if ($data->count() != 0) {
                return sendSuccessResponse($data, 'Data Retrieved Successfully!');
            } else {
                return sendSuccessResponse($data, 'Data not found!');
            }
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:products,name'],
            'price' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png'],
        ]);

        if ($validator->fails()) {
            return sendErrorResponse('Data Validation Error!', $validator->errors(), 422);
        }

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['image'] = File::upload($request->file('image'), 'product');

        try {
            $product = Product::create($data);
            if ($product) {
                return sendSuccessResponse($product, 'Data Created Successfully!', 201);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Something Went Wrong! {$e->getMessage()}", 500);
        }
    }
    public function show($slug)
    {
        try {
            $product = Product::whereSlug($slug)->first();
            if ($product) {
                return sendSuccessResponse($product, 'Data Retrieved Successfully!');
            } else {
                return sendSuccessResponse([], 'Data Not Found!', 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse([], "Something went wrong! {$e->getMessage()}", 400);
        }
    }

    public function update(Request $request, $id)
    {
    }
    public function delete($slug)
    {
        try {
            $product = Product::whereSlug($slug)->first();
            if ($product) {
                $product->delete();
                return sendSuccessResponse([], 'Data Deleted Successfully!');
            } else {
                return sendSuccessResponse([], 'Data Not Found!', 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse([], "Something went wrong! {$e->getMessage()}", 400);
        }
    }
}
