<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function salida_almacens()
    {
        return $this->hasMany(Salida_Almacen::class, 'id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }
}
