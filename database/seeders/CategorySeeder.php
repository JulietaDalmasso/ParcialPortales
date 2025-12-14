<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_id' => 1,
            'name' => 'Inteligencia Artificial', 
        ]);
        Category::create([
            'category_id' => 2,
            'name' => 'Diseño Web', 
        ]);
        Category::create([
            'category_id' => 3,
            'name' => 'Marketing Digital', 
        ]);
        Category::create([
            'category_id' => 4,
            'name' => 'Programación', 
        ]);
        Category::create([
            'category_id' => 5,
            'name' => 'Otro', 
        ]);
    }
}
