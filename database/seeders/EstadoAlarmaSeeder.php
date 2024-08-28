<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstadoAlarmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ctl_estado_alarma')->insert([
            ['descripcion'=>'activo'],
            ['descripcion'=>'inactivo']
        ]);
    }
}
