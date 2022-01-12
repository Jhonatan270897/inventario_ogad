<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'estado_conservacion',
        'estado_activo',
        'detalles',
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    public function entrada_almacens()
    {
        return $this->belongsTo(Producto::class, 'id_entrada_almacen');
    }
}
