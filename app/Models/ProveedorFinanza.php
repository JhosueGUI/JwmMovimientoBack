<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProveedorFinanza extends Model
{
    protected $table='proveedor_finanza';
    protected $fillable=[
        'nombre_proveedor',
        'ruc',
        'estado_registro'
    ];
    protected $primaryKey='id';
    protected $hidden=[
        'created_at','updated_at','deleted_at'
    ];
    //le da su id a movimiento
    public function movimiento(){
        return $this->hasMany(Movimiento::class);
    }
}
