<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index(Request $request)
    {
        $permissions = Permission::all();

        return view('backend.settings.permission.index',compact('permissions'));
    }

    public function store(Permission $permission, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions',
            'display_name' => 'required|unique:permissions',
            'description' => 'required'
        ]);
        $permission->savePermission($request);
        session()->flash('success',"Permission Created!");
        return redirect()->route('admin.permission.');
    }

    public function edit(Permission $permission)
    {
        return view('admin.settings.permission.modal._edit',compact('permission'))->render();
    }

    public function update(Permission $permission, Request $request)
    {
        $permission->updatePermission($permission, $request);

        $this->success('success','Permission updated successfully!');

        return back();
    }

    public function delete(Permission $permission)
    {
        $permission->delete();

        return back();
    }
}
