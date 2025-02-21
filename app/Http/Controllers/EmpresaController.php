<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function getEmpresa() {
        try {
            $empresas = Empresa::where('estado_registro', 'A')->get();
            return response()->json(['data' => $empresas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
