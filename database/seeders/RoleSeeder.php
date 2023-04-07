<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                "name" => "Admin",
                "display_name" => "Admin",
                "description" => "Admin",
            ],
            [
                "name" => "Viewer",
                "display_name" => "Viewer",
                "description" => "Viewer",
            ],
            [
                "name" => "Editor",
                "display_name" => "Editor",
                "description" => "Editor",
            ],
            [
                "name" => "Normal",
                "display_name" => "Normal",
                "description" => "Normal",
            ],
        ];

        foreach($roles as $role){
            Role::create([
                "name" => $role["name"],
                "display_name" => $role["display_name"],
                "description" => $role["description"],
            ]);
        }
    }
}
