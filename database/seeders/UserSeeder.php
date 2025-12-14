<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,  
            'name' => 'Malena Pujadas',
            'email' => 'malena.pujadas@davinci.edu.ar',
            'password' => Hash::make('12345678'),
            'rol' => 'admin',
        ]);
    }
}
