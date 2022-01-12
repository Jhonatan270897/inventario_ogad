<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_Salida extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_salida',
        'detalles',
        'estado_conservacion',
        'estado_activo',
    ];

    public function stocks()
    {
        return $this->belongsTo(Stock::class, 'id_stock');
    }
    public function salida_almacens()
    {
        return $this->belongsTo(Producto::class, 'id_salida_almacen');
    }
}
