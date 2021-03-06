<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'nombre_categoria',
        'descripcion',
        'estado_activo',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id');
    }
}
