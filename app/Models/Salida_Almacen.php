<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida_Almacen extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalles',
        'ruta',
        'estado_activo',
    ];

    public function personas()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function detalles_salidas()
    {
        return $this->hasMany(detalles_salidas, 'id');
    }
}
