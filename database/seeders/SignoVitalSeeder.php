<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SignoVitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ctl_signo_vital')->insert([
            ['nombre'=>'Presión sistólica'],
            ['nombre'=>'Presión diástolica'],
            ['nombre'=>'Frecuencia respiratoria'],
            ['nombre'=>'Temperatura (F°)'],
            ['nombre'=>'Temperatura (C°)'],
            ['nombre'=>'Pulso'],
            ['nombre'=>'Oxígeno en la sangre'],
        ]);
    }
}
