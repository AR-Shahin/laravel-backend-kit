<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('backend.admin.index',compact('admins'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('backend.admin.create',compact('roles'));
    }
    function store(Request $request,Admin $admin)
    {
       // return $request;
        $admin = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        $admin->roles()->attach([$request->role]);
    //   $admin->syncRole($request->role);
        return $admin;
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
