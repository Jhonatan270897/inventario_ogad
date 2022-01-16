<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_total',
        'estado_conservacion',
    ];

    public function detalles_entrada()
    {
        return $this->belongsTo(Detalles_Entrada::class, 'id_detalles_entrada');
    }

    public function detalles_salidas()
    {
        return $this->hasMany(Detalles_Salida::class, 'id');
    }
}
