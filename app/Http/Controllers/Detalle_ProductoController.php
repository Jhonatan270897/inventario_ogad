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
        $detalle_producto->create([
            'nombre_producto' => $request->nombre_producto,
            'descripcion' => $request->descripcion,
            'estado_activo' => $request->estado_activo
        ]);
    }
    public function show($detalle_producto)
    {
        return $detalle_producto;
    }

    public function update(Request $request, $detalle_producto)
    {
        $dp = Detalle_Producto::find($detalle_producto);
        $dp->update($request->all());
        return $dp;
    }

    public function destroy($detalle_producto)
    {
        $dp = Detalle_Producto::find($detalle_producto);
        $dp->update([
            'estado_activo' => '1'
        ]);
        return $dp;
    }
}
