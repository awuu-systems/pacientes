<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnfermedadCronica extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ctl_enfermedad_cronica')->insert([
            ['nombre'=>'Insuficiencia renal'],
            ['nombre'=>'Diabetes'],
            ['nombre'=>'Hipertensión'],
            ['nombre'=>'Artritis'],
            ['nombre'=>'Asma'],
            ['nombre'=>'Epilepsia'],
            ['nombre'=>'Cáncer'],
            ['nombre'=>'Enfermedad de Alzheimer'],
            ['nombre'=>'Enfermedad de Parkinson'],
            ['nombre'=>'Enfermedad de Huntington'],
            ['nombre'=>'Enfermedad de Crohn'],
            ['nombre'=>'Enfermedad de Colitis Ulcerosa'],
            ['nombre'=>'Enfermedad de Páncreas'],
            ['nombre'=>'Enfermedad de Tiroides'],
        ]);
    }
}
