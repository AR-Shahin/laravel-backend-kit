<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

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
}
