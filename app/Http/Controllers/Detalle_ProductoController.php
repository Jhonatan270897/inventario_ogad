<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle_Producto;

class Detalle_ProductoController extends Controller
{
    public function index()
    {
        return Detalle_Producto::get();
    }

    public function store(Request $request)
    {
        $detalle_producto = new Detalle_Producto;
        $detalle_producto->nombre_producto = trim($request->nombre_producto);
        $detalle_producto->descripcion = trim($request->descripcion);
        $detalle_producto->estado_activo = $request->estado_activo;
        $detalle_producto->save();
    }
    public function show(Detalle_Producto $detalle_producto)
    {
        return $detalle_producto;
    }

    public function update(Request $request, Detalle_Producto $detalle_producto)
    {
        $detalle_producto->nombre_producto = trim($request->nombre_producto);
        $detalle_producto->descripcion = trim($request->descripcion);
        $detalle_producto->estado_activo = $request->estado_activo;
        $detalle_producto->save();
    }

    public function destroy(Detalle_Producto $detalle_producto)
    {
        $detalle_producto->delete();
    }
}
