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

    public function show($salida_almacen)
    {
        return $salida_almacen;
    }
    public function update(Request $request, $salida_almacen)
    {
        $salida_almacen = Salida_Almacen::find($salida_almacen);
        $salida_almacen->detalles = $request->tipo_unidad;
        $salida_almacen->ruta = $request->valor_unidad;
        $salida_almacen->estado_activo = $request->estado_activo;
        $salida_almacen->id_usuario = Auth::id();
        $salida_almacen->save();
    }

    public function destroy($salida_almacen)
    {
        //
    }
}
