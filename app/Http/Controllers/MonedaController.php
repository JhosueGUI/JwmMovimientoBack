<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    public function getMoneda(){
        try {
            $monedas = Moneda::where('estado_registro', 'A')->get();
            return response()->json(['data' => $monedas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
