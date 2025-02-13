<?php

namespace Database\Seeders;

use App\Models\Moneda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonedaSeeder extends Seeder
{
    public function run(): void
    {
        $monedas=[
            'SOLES',
            'DOLARES',
        ];
        foreach($monedas as $moneda){
            Moneda::create([
                'nombre_moneda'=>$moneda,
            ]);
        }
    }
}
