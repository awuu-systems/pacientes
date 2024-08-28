<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ctl_especialidad')->insert([
            ['nombre'=>'Cardiólogo'],
            ['nombre'=>'Ginecólogo'],
            ['nombre'=>'Pediatra'],
            ['nombre'=>'Traumatologo'],
            ['nombre'=>'Oftalmólogo'],
            ['nombre'=>'Ortopedista'],
            ['nombre'=>'Urologista'],
            ['nombre'=>'Dermatólogo'],
            ['nombre'=>'Neurologista'],
            ['nombre'=>'Psiquiatra'],
            ['nombre'=>'Endocrinólogo'],
            ['nombre'=>'Reumatólogo'],
            ['nombre'=>'Infectólogo'],
            ['nombre'=>'Oncólogo'],
        ]);
    }
}
