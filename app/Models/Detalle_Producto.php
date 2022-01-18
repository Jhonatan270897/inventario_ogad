<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Producto extends Model
{
    public $timestamps = false;
    protected $table = 'detalle_productos';
    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'estado_activo',
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id');
    }
}
