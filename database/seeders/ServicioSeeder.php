<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicios')->insert([
            [
                'servicio_id'      => 1,
                'nombre'           => 'Diseño Gráfico',
                'precio'           => 15000,
                'descripcion'      => 'Servicio de diseño gráfico integral que incluye la creación de logotipos, branding, diseño de piezas gráficas digitales e impresas.',
                'descripcion_corta' => 'Creación de identidad visual y piezas gráficas.',
                'imagen'           => 'images/servicios/diseno_grafico.jpg',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'servicio_id'      => 2,
                'nombre'           => 'Fotografía Profesional',
                'precio'           => 25000,
                'descripcion'      => 'Sesiones fotográficas profesionales para productos, retratos y eventos. Incluye edición y retoque digital.',
                'descripcion_corta' => 'Fotografía de calidad para productos y eventos.',
                'imagen'           => 'images/servicios/fotografia.jpg',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'servicio_id'      => 3,
                'nombre'           => 'Desarrollo Web',
                'precio'           => 40000,
                'descripcion'      => 'Desarrollo de sitios web personalizados, optimizados para SEO y adaptados a dispositivos móviles. Incluye integración con bases de datos y panel de administración.',
                'descripcion_corta' => 'Sitios web modernos y funcionales.',
                'imagen'           => 'images/servicios/desarrollo_web.jpg',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
        ]);
    }
}
