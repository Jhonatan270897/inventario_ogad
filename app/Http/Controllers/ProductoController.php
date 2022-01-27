<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function index()
    {
        $producto = new Producto();
        return $producto::join('detalle_productos', 'detalle_productos.id', '=', 'productos.id_detalle_producto')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->select(
                'productos.id AS idp',
                'productos.id_detalle_producto AS iddp',
                'productos.id_categoria AS idc',
                'productos.id_marca AS idm',
                'detalle_productos.nombre_producto',
                'categorias.nombre_categoria',
                'marcas.nombre_marca',
                'productos.color',
                'productos.modelo',
                'productos.medida',
                'productos.estado_activo'
            )
            ->where('productos.estado_activo', '=', '0')
            ->get();
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->color = $request->color;
        $producto->modelo = trim($request->modelo);
        $producto->medida = trim($request->medida);
        $producto->estado_activo = "0";
        $producto->id_detalle_producto = $request->iddp;
        $producto->id_categoria = $request->idc;
        $producto->id_marca = $request->idm;
        $producto->save();
        return $producto->id;
    }
    public function show(Producto $producto)
    {
        return $producto;
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->color = $request->color;
        $producto->modelo = $request->trim(modelo);
        $producto->medida = $request->trim(medida);
        $producto->estado_activo = $request->estado_activo;
        $producto->id_detalle_producto = $request->id_detalle_producto;
        $producto->id_categoria = $request->id_marca;
        $producto->id_marca = $request->id_marca;
        $producto->save();
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
    }
}
