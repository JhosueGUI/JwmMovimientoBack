<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaFinanza extends Model
{
    protected $table='persona_finanza';
    protected $fillable=[
        'nombre_persona',
        'dni',
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
