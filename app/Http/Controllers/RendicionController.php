<?php

namespace App\Http\Controllers;

use App\Models\Rendicion;
use Illuminate\Http\Request;

class RendicionController extends Controller
{
    public  function getRendicion(){
        try{
            $rendicion = Rendicion::all();
            if(!$rendicion){
                return response()->json(['error' => 'No se encontraron rendiciones'], 404);
            }
            return response()->json(['data' => $rendicion], 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
