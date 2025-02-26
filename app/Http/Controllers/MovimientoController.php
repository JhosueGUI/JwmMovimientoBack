<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Moneda;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class MovimientoController extends Controller
{
    public function get()
    {
        try {
            $movimientos = Movimiento::with(['modo', 'cliente', 'sub_categoria.categoria', 'empresa', 'estado', 'rendicion', 'sustento', 'moneda'])->where('estado_registro', 'A')->get();
            return response()->json(['data' => $movimientos], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            //traemos a la empresa
            $empresa = Empresa::where('id', $request->empresa_id)->first();
            if (!$empresa) {
                return response()->json(['error' => 'Empresa no encontrada'], 404);
            }
            $moneda = Moneda::where('id', $request->moneda_id)->first();
            if (!$moneda) {
                return response()->json(['error' => 'Moneda no encontrada'], 404);
            }
            //Obtener ingreso
            $numero_ingreso = $request->ingreso;
            //Obtener egreso
            $numero_egreso = $request->egreso;
            //Calcular el total
            if ($moneda->id === 1) {
                if ($request->ingreso) {
                    $total_ingreso_soles = $empresa->total_ingreso_soles + $numero_ingreso;
                    $empresa->update([
                        'total_ingreso_soles' => $total_ingreso_soles
                    ]);
                } else if ($request->egreso) {
                    $total_egreso_soles = $empresa->total_egreso_soles + $numero_egreso;
                    $empresa->update([
                        'total_egreso_soles' => $total_egreso_soles
                    ]);
                }
            } else if ($moneda->id === 2) {
                if ($request->ingreso) {
                    $total_ingreso_dolares = $empresa->total_ingreso_dolares + $numero_ingreso;
                    $empresa->update([
                        'total_ingreso_dolares' => $total_ingreso_dolares
                    ]);
                } else if ($request->egreso) {
                    $total_egreso_dolares = $empresa->total_egreso_dolares + $numero_egreso;
                    $empresa->update([
                        'total_egreso_dolares' => $total_egreso_dolares
                    ]);
                }
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
                'obs' => $request->obs,
                'n_retencion' => $request->n_retencion,
                'fecha_retencion' => $request->fecha_retencion,
                'modo_id' => $request->modo_id,
                'cliente_id' => $request->cliente_id,
                'sub_categoria_id' => $request->sub_categoria_id,
                'empresa_id' => $empresa->id,
                'estado_id' => $request->estado_id,
                'rendicion_id' => $request->rendicion_id,
                'sustento_id' => $request->sustento_id,
                'moneda_id' => $request->moneda_id,
            ]);
            DB::commit();
            return response()->json(['resp' => 'Movimiento creado con éxito'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function crearTrazabilidad($idMovimiento, Request $request)
    {
        try {
            db::beginTransaction();
            $movimiento = Movimiento::where('id', $idMovimiento)->first();
            if (!$movimiento) {
                return response()->json(['resp' => 'Movimiento no encontrado'], 404);
            }
            $movimiento->update([
                'solicitante' => $request->solicitante,
                'sub_destino_placa' => $request->sub_destino_placa,
                'sub_categoria_id' => $request->sub_categoria_id,
                'estado_id' => $request->estado_id,
                'rendicion_id' => $request->rendicion_id,
                'serie' => $request->serie,
                'n_factura' => $request->n_factura,
                'fecha_factura' => $request->fecha_factura,
                'obs' => $request->obs,
                'n_retencion' => $request->n_retencion,
                'fecha_retencion' => $request->fecha_retencion,
            ]);

            db::commit();
            return response()->json(['resp' => "Trazabilidad creado correctamente"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
