<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovedadHasCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('novedades_have_categorys')->insert([
            [
                'novedad_fk' => 1,
                'category_fk' => 2,
            ],
            [
                'novedad_fk' => 1,
                'category_fk' => 4,
            ],
            [
                'novedad_fk' => 2,
                'category_fk' => 1,
            ],
            [
                'novedad_fk' => 3,
                'category_fk' => 5,
            ],
            [
                'novedad_fk' => 4,
                'category_fk' => 2,
            ],
            [
                'novedad_fk' => 4,
                'category_fk' => 3,
            ],
            [
                'novedad_fk' => 5,
                'category_fk' => 3,
            ],
        ]);
    }
}
