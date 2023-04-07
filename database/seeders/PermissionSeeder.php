<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = require app_path("data/permissions.php");
       
        foreach($permissions as $permission){
            Permission::create([
                "name" => $permission["name"],
                "display_name" => $permission["display_name"],
                "description" => $permission["description"],
            ]);
        }
    }
}
