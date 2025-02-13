<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            //traemos a la empresa
            $empresa = Empresa::where('id', $request->empresa_id)->first();
            if(!$empresa){
                return response()->json(['error' => 'Empresa no encontrada'], 404);
            }
            //Obtener ingreso
            $numero_ingreso = $request->ingreso;
            //Obtener egreso
            $numero_egreso = $request->egreso;
            //Calcular el total
            if($request->ingreso){
                $total_ingreso = $empresa->total_ingreso + $numero_ingreso;
                $empresa->update([
                    'total_ingreso' => $total_ingreso
                ]);
            }else if($request->egreso){
                $total_egreso = $empresa->total_egreso + $numero_egreso;
                $empresa->update([
                    'total_egreso' => $total_egreso
                ]);
            }
            Movimiento::create([
                'fecha' => $request->fecha,
                'n_operacion' => $request->n_operacion,
                'ingreso' => $numero_ingreso,
                'egreso' => $numero_egreso,
                'descripcion' => $request->descripcion,
                'solicitante' => $request->solicitante,
                'sub_destino_placa' => $request->sub_destino_placa,
                'serie' => $request->serie,
                'n_factura' => $request->n_factura,
                'fecha_factura' => $request->fecha_factura,
                'OBS' => $request->OBS,
                'n_retencion' => $request->n_retencion,
                'fecha_retencion' => $request->fecha_retencion,
                'modo_id' => $request->modo_id,
                'proveedor_id' => $request->proveedor_id,
                'sub_categoria_id' => $request->sub_categoria_id,
                'empresa_id' => $empresa->id,
                'estado_id' => $request->estado_id,
                'rendicion_id' => $request->rendicion_id,
                'sustento_id' => $request->sustento_id,
                'moneda_id' => $request->moneda_id,
            ]);
            DB::commit();
            return response()->json(['message' => 'Movimiento creado con éxito'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
