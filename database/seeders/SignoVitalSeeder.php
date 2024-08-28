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
            ['nombre'=>'Peso'],
            ['nombre'=>'Presión'],
            ['nombre'=>'Glucosa'],
        ]);
    }
}
