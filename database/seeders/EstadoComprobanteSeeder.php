<?php

namespace Database\Seeders;

use App\Models\EstadoComprobante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoComprobanteSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            'ENTREGADO',
            'PENDIENTE'
        ];
        foreach ($estados as $estado) {
            EstadoComprobante::create([
                'nombre_estado_comprobante' => $estado,
            ]);
        }
    }
}
