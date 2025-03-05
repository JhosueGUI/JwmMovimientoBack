<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function getCliente()
    {
        try {
            $clientes = Cliente::where('estado_registro', 'A')->get();
            return response()->json(['data' => $clientes], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            Cliente::create([
                'nombre_cliente' => $request->nombre_cliente,
            ]);
            DB::commit();
            return response()->json(['resp' => 'Cliente creado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
