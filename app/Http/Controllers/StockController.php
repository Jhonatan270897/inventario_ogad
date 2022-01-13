<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{

    public function index()
    {
        $stock = Stock
            ::join('productos', 'productos.id', '=', 'stocks.id_producto')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select('*')
            ->where("productos.estado_activo", "=", "0")
            ->get();
        return $stock;
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
