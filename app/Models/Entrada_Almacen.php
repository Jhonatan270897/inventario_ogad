<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada_Almacen extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function detalles_entradas()
    {
        return $this->hasMany(Detalles_Entrada::class, 'id');
    }
}
