<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ctl_sintoma')->insert([
            ['nombre'=>'Dolor de cabeza'],
            ['nombre'=>'Fiebre'],
            ['nombre'=>'Dolor de garganta'],
            ['nombre'=>'Dolor de cuerpo'],
            ['nombre'=>'Dolor de barriga'],
            ['nombre'=>'Dolor de ojos'],
            ['nombre'=>'Dolor de oídos'],
            ['nombre'=>'Dolor de nariz'],
        ]);
    }
}
