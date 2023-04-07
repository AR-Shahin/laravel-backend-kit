<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
         PermissionSeeder::class,
         RoleSeeder::class,
        ]);

        $role = Role::first();
        $permissions = Permission::select("id")->get();
        $role->permissions()->sync($permissions);

        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);

        $admin->roles()->attach(1);

        for ($i=0; $i < 50; $i++) {
            Admin::create([
                'name' => "Admin $i",
                'email' => "admin$i@mail.com",
                'password' => bcrypt('password')
            ]);
        }
        // \App\Models\Admin::factory(10)->create();
        //Product::factory(10)->create();
    }
}
