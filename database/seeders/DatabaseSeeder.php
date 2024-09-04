<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            Rol::class,
            EspecialidadSeeder::class,
            EstadoAlarmaSeeder::class,
            MedicamentoSeeder::class,
            SignoVitalSeeder::class,
            SintomaSeeder::class,
            EnfermedadCronica::class,
            UserSeeder::class
        ]);
    }
}
