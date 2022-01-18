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
        $detalle_producto->update($request->all());
    }

    public function destroy($detalle_producto)
    {
        $detalle_producto->update([
            'estado_activo' => ''
        ]);
    }
}
