<?php

namespace Database\Seeders;

use App\Models\ProveedorFinanza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorFinanzaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedor_finanzas = [
            'Brama Transportes Y Comercializaciones E.',
            'MONTERO REPUESTOS DIESEL E.I.R.L.',
        ];
        foreach ($proveedor_finanzas as $proveedor_finanza) {
            ProveedorFinanza::create([
                'nombre_proveedor' => $proveedor_finanza,
                'ruc' => '12345678',
            ]);
        }
    }
}
