<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDController extends Controller
{
    public function index()
    {
        $response = DB::table('admins')->pluck('name');

       return $response;
        dd($response);
    }
}
