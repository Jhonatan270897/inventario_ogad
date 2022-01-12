<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_producto',
        'color',
        'modelo',
        'detalles',
        'estado_activo',
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    public function marcas()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }

    public function detalle_entradas()
    {
        return $this->hasMany(Detalles_Entrada::class, 'id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'id');
    }
}
