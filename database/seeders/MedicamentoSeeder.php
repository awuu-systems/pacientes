<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ctl_medicamento')->insert([
            ['nombre'=>'Darbepoetina alfa (Aranesp)',
            'descripcion'=>'N/A',
            'precio_min'=>0,
            'precio_max'=>100
        ],
        ['nombre'=>'Dexametasona',
            'descripcion'=>'N/A',
            'precio_min'=>0,
            'precio_max'=>100
        ],
        ['nombre'=>'Prednisona',
            'descripcion'=>'N/A',
            'precio_min'=>0,
            'precio_max'=>100
        ],
        ['nombre'=>'Acetaminofen',
            'descripcion'=>'N/A',
            'precio_min'=>0,
            'precio_max'=>100
        ],
        ['nombre'=>'Amoxicilina',
            'descripcion'=>'N/A',
            'precio_min'=>0,
            'precio_max'=>100
        ],
    ]);
    }
}
