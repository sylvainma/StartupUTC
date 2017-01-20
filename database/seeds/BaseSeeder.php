<?php

use Illuminate\Database\Seeder;
use App\Department;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Departments
      Department::create(['name' => 'GI', 'description' => 'Génie informatique']);
      Department::create(['name' => 'GSU', 'description' => 'Génie des systèmes urbains']);
      Department::create(['name' => 'GM/GSM', 'description' => 'Génie mécanique']);
      Department::create(['name' => 'GB', 'description' => 'Génie biologique']);
      Department::create(['name' => 'GP', 'description' => 'Génie des procédés']);
      Department::create(['name' => 'Autre', 'description' => 'Autre']);
    }
}
