<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Producto extends Model
{
    protected $table = 'detalle_productos';
    protected $fillable = [
        'nombre_producto',
        'estado_activo',
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id');
    }
}
