<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstadoComprobanteController;
use App\Http\Controllers\ModoController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\PersonaFinanzaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProveedorFinanzaController;
use App\Http\Controllers\RendicionController;
use App\Http\Controllers\SubCategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'movimiento'], function () {
    Route::get('/get', [MovimientoController::class, 'get']);
    Route::post('/create', [MovimientoController::class, 'create']);
    Route::post('/trazabilidad/{idMovimiento}', [MovimientoController::class, 'crearTrazabilidad']);
});
Route::group(['prefix' => 'estado-comprobante'], function () {
    Route::get('/get', [EstadoComprobanteController::class, 'GetEstado']);
});
Route::group(['prefix' => 'rendicion'], function () {
    Route::get('/get', [RendicionController::class, 'getRendicion']);
});
Route::group(['prefix' => 'empresa'], function () {
    Route::get('/get', [EmpresaController::class, 'getEmpresa']);
});
Route::group(['prefix' => 'modo'], function () {
    Route::get('/get', [ModoController::class, 'getModo']);
});
Route::group(['prefix' => 'moneda'], function () {
    Route::get('/get', [MonedaController::class, 'getMoneda']);
});
Route::group(['prefix' => 'cliente'], function () {
    Route::get('/get', [ClienteController::class, 'getCliente']);
});
Route::group(['prefix' => 'sub_categoria'], function () {
    Route::get('/get', [SubCategoriaController::class, 'getSubCategoria']);
});
Route::group(['prefix' => 'persona_finanza'], function () {
    Route::get('/get/{PersonaDNI}', [PersonaFinanzaController::class, 'ObtenerPersonalApi']);
    Route::post('/create', [PersonaFinanzaController::class, 'crearPersonal']);
    Route::get('/get', [PersonaFinanzaController::class, 'getPersonaFinanza']);
});
Route::group(['prefix' => 'proveedor_finanza'], function () {
    Route::get('/get/{RUC}', [ProveedorFinanzaController::class, 'ObtenerProveedorApi']);
    Route::post('/create', [ProveedorFinanzaController::class, 'createproveedorFinanza']);
    Route::get('/get', [ProveedorFinanzaController::class, 'getProveedorFinanza']);
});