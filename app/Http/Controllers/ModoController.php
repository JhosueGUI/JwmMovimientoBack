<?php

namespace App\Http\Controllers;

use App\Models\Modo;
use Illuminate\Http\Request;

class ModoController extends Controller
{
    public function getModo(){
        try {
            $modos = Modo::where('estado_registro', 'A')->get();
            return response()->json(['data' => $modos], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
