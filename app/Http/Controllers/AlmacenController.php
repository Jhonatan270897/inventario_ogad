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
        $entradas = Entrada_Almacen::all();
        return view('almacen/entrada', compact('entradas'));
    }
}
