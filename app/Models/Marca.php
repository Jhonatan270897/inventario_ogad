<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombre_marca',
        'descripcion',
        'estado_activo',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id');
    }
}
