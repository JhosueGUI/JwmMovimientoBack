<?php

namespace App\Http\Controllers;

use App\Models\PersonaFinanza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaFinanzaController extends Controller
{
    public function ObtenerPersonalApi($PersonaDNI)
    {
        try {
            $token = 'apis-token-13379.cSavY9e72ISAkP5ju5d6AmFz3tDaovtb';
            $dni = $PersonaDNI;

            // Iniciar llamada a API
            $curl = curl_init();
            // Buscar dni
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 2,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Referer: https://apis.net.pe/consulta-dni-api',
                    'Authorization: Bearer ' . $token
                ),
            ));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);
            curl_close($curl);

            // Decodificar la respuesta JSON
            $persona = json_decode($response);

            // Verificar si la respuesta contiene los datos esperados
            if ($persona && isset($persona->nombres)) {
                // Devolver solo los datos necesarios
                return response()->json(['resp' => [
                    'nombres' => $persona->nombres,
                    'apellidoPaterno' => $persona->apellidoPaterno,
                    'apellidoMaterno' => $persona->apellidoMaterno,
                    'nombreCompleto' => $persona->nombres . ' ' . $persona->apellidoPaterno . ' ' . $persona->apellidoMaterno,
                ]], 200);
            }
            return response()->json(['error' => 'Persona no encontrada o respuesta inválida'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function crearPersonal(Request $request)
    {
        try {
            DB::beginTransaction();
            PersonaFinanza::create([
                'dni' => $request->dni,
                'nombre_persona' => $request->nombre_persona,
            ]);
            DB::commit();
            return response()->json(['resp' => 'Personal creado correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getPersonaFinanza()
    {
        try {
            $persona_finanza = PersonaFinanza::where('estado_registro', 'A')->get();
            return response()->json(['data' => $persona_finanza], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
