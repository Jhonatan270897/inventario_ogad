<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{


    public function index()
    {
        $stock = new Stock();
        return $stock::join('detalles_entradas', 'detalles_entradas.id', '=', 'stocks.detalles_entrada')
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
            ->where('stocks.cantidad_total', '>', '0')
            ->orderBy('detalles_entradas.created_at', 'DESC')
            ->get();
    }

    public function store(Request $request)
    {
        $stock = new Stock;
        $stock->create($request->all());
    }

    public function show(Stock $stock)
    {
        return $stock;
    }
    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());
    }

    public function destroy(Stock $stock)
    {
        //
    }
}
