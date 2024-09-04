<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombre' => 'Super',
            'apellidos' => 'Admin',
            'DUI'=>'111111111' ,
            'email'=>'admin@admin.com',
            'foto_usuario'=>'foto',
            'password' => Hash::make('12345678'),
            'id_rol'=>1,
            'fecha_nacimiento'=>'2000-12-12'
        ]);

    }
}
