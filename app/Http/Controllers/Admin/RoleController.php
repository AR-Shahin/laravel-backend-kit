<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(Role $role, Request $request)
    {

        // if ($request->ajax()) {
        //      $data = $role->getRole();

        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $editLink = route('role.edit',$row->id);
        //             $deleteLink = route('role.delete',$row->id);
        //             return getDynamicPointButtonLink($editLink, $deleteLink);
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        $roles = $role->getRole();
        return view('backend.settings.role.index',compact("roles"));
    }

    public function create(Permission $permission)
    {
        $permissions = $permission->getPermission();

        return view('backend.settings.role.create',[
            'permissions' => $permissions
        ]);
    }

    public function store(Role $role, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required|unique:roles'
        ]);
        $role->saveRole($request);

        return redirect()->route('admin.role.');
    }

    public function edit(Role $role, Permission $permission)
    {
      $permissions  = $permission->getPermission();
      $userRolePermissions = userRolePermissions($role->id);

      $role_permission       = [];

      foreach($userRolePermissions as $r) {
         $role_permission[$r->permission_id] = 1;
      }

      return view('admin.settings.role.edit',[
        'permissions' => $permissions,
        'role' => $role,
        'role_permission' => $role_permission
      ]);
    }

    public function update(Role $role, EditRoleRequest $request)
    {
        $role->updateRole($role, $request);

        return $this->success('role','Role updated successfully!');
    }

    public function delete(Role $role)
    {
        $role->delete();

        return $this->success('role','Role deleted successfully!');
    }
}
