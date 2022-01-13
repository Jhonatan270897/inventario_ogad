<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida_Almacen;

class Salida_AlmacenController extends Controller
{
    public function index()
    {
        return Salida_Almacen::get();
    }

    public function store(Request $request)
    {
        $salida_almacen = new Salida_Almacen;
        $salida_almacen->create($request->all());
    }

    public function show(Salida_Almacen $salida_almacen)
    {
        return $salida_almacen;
    }
    public function update(Request $request, Salida_Almacen $salida_almacen)
    {
        $salida_almacen->update($request->all());
    }

    public function destroy(Salida_Almacen $salida_almacen)
    {
        //
    }
}
