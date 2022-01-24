<?php

namespace App\Http\Controllers;

use App\Models\Detalles_Salida;
use Illuminate\Http\Request;

class Detalles_SalidaController extends Controller
{

    public function index()
    {
        $detalles_salida = new Detalles_Salida();
        return $detalles_salida::join()
            ->join('detalles_entradas', 'detalles_entradas.id', '=', 'stocks.detalles_entrada')
            ->join('entrada_almacens', 'entrada_almacens.id', '=', 'detalles_entradas.id_entrada_almacen')
            ->join('users', 'users.id', '=', 'entrada_almacens.id_usuario')
            ->join('productos', 'productos.id', '=', 'detalles_entradas.id_producto')
            ->join('detalle_productos', 'detalle_productos.id', '=', 'productos.id_detalle_producto')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select(
                'stocks.id AS ids',
                'detalles_entradas.id AS idde',
                'entrada_almacens.ruta',
                'categorias.nombre_categoria',
                'detalles_entradas.tipo_unidad',
                'detalles_entradas.valor_unidad',
                'stocks.cantidad_total',
                'detalle_productos.nombre_producto',
                'marcas.nombre_marca',
                'productos.modelo',
                'productos.medida',
                'productos.color',
                'detalles_entradas.created_at',
                'entrada_almacens.detalles as d_entrada',
                'stocks.estado_conservacion',
                'users.name'
            )
            ->where('detalles_entradas.estado_activo', '=', '0')
            ->orderBy('detalles_entradas.created_at', 'DESC')
            ->get();
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
