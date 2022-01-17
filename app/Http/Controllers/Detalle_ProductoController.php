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
        $detalle_producto->create($request->all());
    }
    public function show($detalle_producto)
    {
        //
    }

    public function update(Request $request, $detalle_producto)
    {
        //
    }

    public function destroy($detalle_producto)
    {
        //
    }
}
