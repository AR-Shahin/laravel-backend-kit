<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Product;
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
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);
        for ($i=0; $i < 50; $i++) {
            Admin::create([
                'name' => "Admin $i",
                'email' => "admin$i@mail.com",
                'password' => bcrypt('password')
            ]);
        }

        $this->call([
         PermissionSeeder::class
        ]);
        // \App\Models\Admin::factory(10)->create();
        //Product::factory(10)->create();
    }
}
