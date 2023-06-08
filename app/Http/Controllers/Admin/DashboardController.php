<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $foos = Foo::all();
        return view('backend.dashboard',compact("foos"));
    }
}
