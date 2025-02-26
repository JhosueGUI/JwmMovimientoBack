<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function getCliente(){
        try {
            $clientes = Cliente::where('estado_registro', 'A')->get();
            return response()->json(['data' => $clientes], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
