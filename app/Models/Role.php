<?php

namespace App\Models;

use Illuminate\Support\Facades\{
    DB,Log
};

use Laratrust\Models\Role as RoleModel;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany};

class Role extends RoleModel
{
    public $guarded = [];

    public $timestamps = false;



    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class,'role_user');
    }

    public function getRole()
    {
        return $this::orderBy('name','asc')->get();
    }

    public function saveRole($request) : Role
    {
        DB::beginTransaction();
        try {
            $this->name = $request->name;
            $this->display_name = $request->display_name;
            $this->description = $request->description;
            $this->save();

            if($request->has('permissions')) {
                $this->permissions()->sync($request->permissions);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Role Create failed :: ' . $e->getMessage());
        }
        DB::commit();

        return $this;
    }

    public function updateRole($role, $request) : Role
    {
        DB::beginTransaction();
        try {
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            $role->save();

            if($request->has('permissions')) {
                $role->permissions()->sync($request->permissions);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Role Update failed :: ' . $e->getMessage());
        }
        DB::commit();

        return $this;
    }
}
