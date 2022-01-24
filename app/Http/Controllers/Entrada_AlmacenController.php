<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada_Almacen;
use Illuminate\Support\Facades\Auth;

class Entrada_AlmacenController extends Controller
{

    public function index()
    {
    }

    public function store(Request $request)
    {
        $entrada_almacen = new Entrada_Almacen();
        $entrada_almacen->detalles = strtoupper($request->detalles);
        $entrada_almacen->ruta = $request->ruta;
        $entrada_almacen->estado_activo = "0";
        $entrada_almacen->id_usuario = Auth::id();
        $entrada_almacen->save();
        return $entrada_almacen->id;
    }
    public function show($entrada_almacen)
    {
        $entrada_almacen = Entrada_Almacen::find($entrada_almacen);
        return $entrada_almacen;
    }
    public function update(Request $request, $entrada_almacen)
    {
        $entrada_almacen = Entrada_Almacen::find($entrada_almacen);
        $entrada_almacen->detalles = strtoupper($request->detalles);
        $entrada_almacen->ruta = $request->ruta;
        $entrada_almacen->estado_activo = $request->estado_activo;
        $entrada_almacen->id_usuario = Auth::id();
        $entrada_almacen->save();
    }

    public function destroy($id)
    {
        $entrada_almacen = Entrada_Almacen::find($entrada_almacen);
        $entrada_almacen->delete();
    }
}
