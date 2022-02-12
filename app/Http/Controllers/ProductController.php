<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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
