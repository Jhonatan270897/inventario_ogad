<?php

namespace App\Http\Controllers;

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
    public function detalle_producto()
    {
        return view('almacen/producto');
    }
    public function marca()
    {
        return view('almacen/marca');
    }
    public function categoria()
    {
        return view('almacen/categoria');
    }
}
