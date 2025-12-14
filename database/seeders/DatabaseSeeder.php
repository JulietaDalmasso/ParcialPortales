<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ServicioSeeder::class,
            CategorySeeder::class,
            NovedadSeeder::class,
            UserSeeder::class, 
            NovedadHasCategorySeeder::class,
            ContratacionesSeeder::class,
        ]);
    }
}
