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
        'medida',
        'estado_activo',
    ];
    public function detalle_productos()
    {
        return $this->belongsTo(Detalle_producto::class, 'id_detalle_producto');
    }
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
}
