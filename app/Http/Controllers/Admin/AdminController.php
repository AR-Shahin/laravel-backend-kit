<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('backend.admin.index',compact('admins'));
    }


    function store(Request $request)
    {

    }

    public function show(Admin $admin)
    {
        return $admin;
    }

    public function edit(Admin $admin)
    {
        return $admin;
    }

    public function destroy(Admin $admin)
    {

    }
    public function update(Request $request, Admin $admin)
    {

    }
}
