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
        Admin::create([
            'name' => 'Admin 2',
            'email' => 'admin2@mail.com',
            'password' => bcrypt('password')
        ]);
        // \App\Models\Admin::factory(10)->create();
        Product::factory(10)->create();
    }
}
