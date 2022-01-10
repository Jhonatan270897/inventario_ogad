<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function detalles_salidas()
    {
        return $this->hasMany(Detalles_Salida::class, 'id');
    }
}
