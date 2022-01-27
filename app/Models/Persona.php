<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nombre_persona',
        'a_paterno',
        'a_materno',
        'estado_activo',
    ];

    public function salida_almacens()
    {
        return $this->hasMany(Salida_Almacen::class, 'id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
