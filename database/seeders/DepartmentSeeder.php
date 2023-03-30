<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $depts = ['CSE',"EEE","BBA","ECO"];

        foreach($depts as $d){
            Department::create(["title" => $d]);
        }
    }
}
