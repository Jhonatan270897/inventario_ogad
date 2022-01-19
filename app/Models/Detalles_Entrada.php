<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Detalles_Entrada extends Model
{

    protected $table = 'detalles_entradas';
    protected $fillable = [
        'tipo_unidad',
        'valor_unidad',
        'cantidad_unidad',
        'estado_conservacion',
        'estado_activo',
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    public function entrada_almacens()
    {
        return $this->belongsTo(Producto::class, 'id_entrada_almacen');
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'id');
    }
}
