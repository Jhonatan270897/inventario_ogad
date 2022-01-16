<?php

namespace App\Http\Controllers;

use App\Models\Entrada_Almacen;
use App\Models\Stock;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function stock()
    {
        return view('almacen/stock');
    }

    public function entrada()
    {
        return view('almacen/entrada');
    }

    public function salida()
    {
        return view('almacen/salida');
    }
}
