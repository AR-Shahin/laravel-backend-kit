<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::with("roles")->get();
        if ($request->ajax()) {
            return DataTables::of($admins)
                ->addIndexColumn()
                ->addColumn('#', function($row){
                    return "<input type='checkbox' value='{$row->id}'> ";
                })
                ->addColumn('actions', function($row){
                    $edit = route("admin.edit",$row->id);
                    $delete = route("admin.delete",$row->id);
                    return deleteAndEditButton($edit,$delete);
                })
                ->rawColumns(['#',"actions"])
                ->make(true);
        }

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
        DB::table("role_user")->insert([
            "user_id" => $admin->id,
            "role_id" => $request->role,
            "user_type" => "App\Models\Admin"
        ]);
    
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

    public function delete(Admin $admin)
    {
        return $admin;
    }
    public function update(Request $request, Admin $admin)
    {

    }
}
