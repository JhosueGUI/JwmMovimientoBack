<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function getProveedor(){
        try {
            $proveedores = Proveedor::where('estado_registro', 'A')->get();
            return response()->json(['data' => $proveedores], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
