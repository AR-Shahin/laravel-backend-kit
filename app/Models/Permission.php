<?php

namespace App\Models;

use Laratrust\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    public $guarded = [];

    public $timestamps = false;

    public function getPermission()
    {
        return $this::orderBy('description')->get();
    }

    public function savePermission($request) : self
    {
        $this->name = $request->name;
        $this->display_name = $request->display_name;
        $this->description = $request->description;
        $this->save();

        return $this;
    }

    public function updatePermission($permission, $request)
    {
        $permission->update([
           'name' => $request->name,
           'display_name' => $request->display_name,
           'description' => $request->description
        ]);

        return $this;
    }


}
