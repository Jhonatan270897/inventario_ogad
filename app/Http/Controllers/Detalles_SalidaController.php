<?php

namespace App\Http\Controllers;

use App\Models\Detalles_Salida;
use Illuminate\Http\Request;

class Detalles_SalidaController extends Controller
{

    public function index()
    {
        $detalles_salida = new Detalles_Salida();
        return $detalles_salida::join('stocks', 'stocks.id', '=', 'detalles_salidas.id_stock')
            ->join('detalles_entradas', 'detalles_entradas.id', '=', 'stocks.detalles_entrada')
            ->join('entrada_almacens', 'entrada_almacens.id', '=', 'detalles_entradas.id_entrada_almacen')
            ->join('users', 'users.id', '=', 'entrada_almacens.id_usuario')
            ->join('productos', 'productos.id', '=', 'detalles_entradas.id_producto')
            ->join('detalle_productos', 'detalle_productos.id', '=', 'productos.id_detalle_producto')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select(
                'detalles_salidas.id AS idds',
                'detalles_salidas.cantidad_salida',
                'detalles_salidas.detalles',
                'detalles_salidas.tipo_unidad',
                'detalles_salidas.estado_conservacion',
                'detalles_salidas.id_stock AS ids',
                'detalles_salidas.id_salida_almacen AS idsa',
                'detalles_salidas.estado_activo',
                'categorias.nombre_categoria',
                'detalle_productos.nombre_producto',
                'marcas.nombre_marca',
                'productos.modelo',
                'productos.medida',
                'productos.color',
                'detalles_salidas.created_at',
                'users.name'
            )
            ->where('detalles_salidas.estado_activo', '=', '0')
            ->orderBy('detalles_salidas.created_at', 'DESC')
            ->get();
    }


    public function store(Request $request)
    {
        $detalles_salida = new Detalles_Salida();
        $detalles_salida->cantidad_salida = $request->cantidad_salida;
        $detalles_salida->tipo_unidad = $request->tipo_unidad_salida;
        $detalles_salida->detalles = $request->detalle;
        $detalles_salida->estado_conservacion = $request->estado_conservacion_salida;
        $detalles_salida->estado_activo = "0";
        $detalles_salida->id_stock = $request->ids;
        $detalles_salida->id_salida_almacen = $request->idsa;
        $detalles_salida->save();
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
