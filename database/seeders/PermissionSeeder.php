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
        $permissions = [
            [
                "name" => "HomeController@index",
                "display_name" => "View Home",
                "description" => "Home",
            ],
            [
                "name" => "HomeController@create",
                "display_name" => "Create Home",
                "description" => "Home",
            ],
            [
                "name" => "HomeController@delete",
                "display_name" => "Delete Home",
                "description" => "Home",
            ],
            [
                "name" => "CrudController@index",
                "display_name" => "View Crud",
                "description" => "Crud",
            ],
            [
                "name" => "CrudController@create",
                "display_name" => "Create Crud",
                "description" => "Crud",
            ],
            [
                "name" => "CrudController@delete",
                "display_name" => "Delete Crud",
                "description" => "Crud",
            ],
            [
                "name" => "AdminController@index",
                "display_name" => "View Admin",
                "description" => "Admin",
            ],
            [
                "name" => "AdminController@create",
                "display_name" => "Create Admin",
                "description" => "Admin",
            ],

            [
                "name" => "AdminController@edit",
                "display_name" => "Edit Admin",
                "description" => "Admin",
            ]
        ];

        foreach($permissions as $permission){
            Permission::create([
                "name" => $permission["name"],
                "display_name" => $permission["display_name"],
                "description" => $permission["description"],
            ]);
        }
    }
}
