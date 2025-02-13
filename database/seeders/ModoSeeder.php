<?php

namespace Database\Seeders;

use App\Models\Modo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modos=[
            'BM',
            'TL',
            'BM:TL'
        ];
        foreach ($modos as $modo) {
            Modo::create([
                'nombre_modo' => $modo
            ]);
        }
    }
}
