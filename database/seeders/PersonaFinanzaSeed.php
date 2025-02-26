<?php

namespace Database\Seeders;

use App\Models\PersonaFinanza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaFinanzaSeed extends Seeder
{
    public function run(): void
    {
        $persona_finanzas=[
            'Rojas Velasquez Franklin R.',
            'Rojas Velasquez Ingrid T.'
        ];
        foreach($persona_finanzas as $persona_finanza){
            PersonaFinanza::create([
                'nombre_persona'=>$persona_finanza,
                'dni'=>'12345678',
            ]);
        }
    }
}
