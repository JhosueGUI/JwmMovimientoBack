<?php

use App\Http\Controllers\MovimientoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'movimiento'], function () {
    Route::get('/create', [MovimientoController::class, 'create']);
});