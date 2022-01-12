<?php

use App\Http\Controllers\AlmacenController;

namespace App\Http\Controllers;

use App\Models\Entrada_Almacen;
use App\Models\Stock;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function stock()
    {
        $stocks = Stock::all();
        return view('almacen/stock', compact('stocks'));
    }

    public function entrada()
    {
        $entradas = Entrada_Almacen::all();
        return view('almacen/entrada', compact('entradas'));
    }
}
