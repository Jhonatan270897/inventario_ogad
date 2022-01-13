<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada_Almacen;

class Entrada_AlmacenController extends Controller
{
    public function index()
    {
        return Entrada_Almacen::get();
    }

    public function store(Request $request)
    {
        $entrada_almacen = new Entrada_Almacen;
        $entrada_almacen->create($request->all());
    }

    public function show(Entrada_Almacen $entrada_almacen)
    {
        return $entrada_almacen;
    }
    public function update(Request $request, Entrada_Almacen $entrada_almacen)
    {
        $entrada_almacen->update($request->all());
    }

    public function destroy(Entrada_Almacen $entrada_almacen)
    {
        //
    }
}
