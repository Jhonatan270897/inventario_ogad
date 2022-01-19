<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function index()
    {
        $producto = Producto

            ::join('detalle_productos', 'detalle_productos.id', '=', 'productos.id_detalle_producto')
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
        return $producto;
    }

    public function store(Request $request)
    {
        //
    }
    public function show($producto)
    {
        return $producto;
    }

    public function update(Request $request, $producto)
    {
        //
    }

    public function destroy($producto)
    {
        //
    }
}
    