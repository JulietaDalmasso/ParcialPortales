<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContratacionesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('servicio_user')->insert([
            'user_id' => 2,
            'servicio_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
