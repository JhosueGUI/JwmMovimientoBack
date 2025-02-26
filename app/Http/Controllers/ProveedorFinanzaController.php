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
    public function getProveedorFinanza()
    {
        try {
            $proveedor_finanza = ProveedorFinanza::where('estado_registro', 'A')->get();
            return response()->json(['data' => $proveedor_finanza], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function ObtenerProveedorApi($RUC)
    {
        $token = 'apis-token-13379.cSavY9e72ISAkP5ju5d6AmFz3tDaovtb';
        $ruc = $RUC;

        // Iniciar llamada a API
        $curl = curl_init();

        // Buscar ruc sunat
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/ruc?numero=' . $ruc,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: http://apis.net.pe/api-ruc',
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $empresa = json_decode($response);
        return response()->json(['resp' => [
            'razon_social' => $empresa->razonSocial,
            'ruc' => $empresa->numeroDocumento,
        ]], 200);
    }
}
