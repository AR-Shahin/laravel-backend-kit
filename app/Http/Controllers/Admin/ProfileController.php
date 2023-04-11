<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {

        $admin = auth('admin')->user();
        return view('backend.auth.profile',compact('admin'));
    }

    public function update(Request $request)
    {
        $id = auth('admin')->id();
        $request->validate([
            "email" => ["unique:admins,email,$id"]
        ]);
        auth('admin')->user()->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);
        return back();
    }

    public function updatePassword(Request $request)
    {

        session()->flash("tab_status","password");

        $request->validate([
        "old_password" => ["required"],
        "password" => ["required","confirmed"],
        "password_confirmation" => ["required"],
        ]);

        if(!Hash::check($request->old_password,auth('admin')->user()->password)){
        session()->flash("status","Old password doesn't match!");
            return back()->withInput();
        }
        auth('admin')->user()->update([
            "password" => bcrypt($request->password)
        ]);
        $this->success("Password Changed Successfully!");
        return back();
    }

    public function updateProfile(Request $request)
    {
        session()->flash("tab_status","profile");

        $request->validate([
        "name" => ["required"]
        ]);

        auth('admin')->user()->update([
            "name" => $request->name
        ]);
        $this->success("Profile updated Successfully!");
        return back();
    }
}
