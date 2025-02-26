<?php

namespace App\Http\Controllers;

use App\Models\ProveedorFinanza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorFinanzaController extends Controller
{
    public function createproveedorFinanza(Request $request)
    {
        try {
            DB::beginTransaction();
            ProveedorFinanza::create([
                'nombre_proveedor' => $request->nombre_proveedor,
                'ruc' => $request->ruc,
            ]);
            DB::commit();
            return response()->json(['resp' => 'Proveedor creado correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
