<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'ITEM',
            'TOTAL UNIDADES',
            'TIPO',
            'VALOR_UNIDAD',
            'CATEGORIA',
            'DENOMINACION',
            'MARCA',
            'MODELO',
            'MEDIDA',
            'COLOR',
            'ESTADO CONSERVACION',
            'FECHA INGRESO',
        ];
    }
    public function collection()
    {
        $stock = new Stock;
        return $stock::join('detalles_entradas', 'detalles_entradas.id', '=', 'stocks.detalles_entrada')
            ->join('entrada_almacens', 'entrada_almacens.id', '=', 'detalles_entradas.id_entrada_almacen')
            ->join('users', 'users.id', '=', 'entrada_almacens.id_usuario')
            ->join('productos', 'productos.id', '=', 'detalles_entradas.id_producto')
            ->join('detalle_productos', 'detalle_productos.id', '=', 'productos.id_detalle_producto')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select(
                'stocks.id AS ids',
                'stocks.cantidad_total',
                'detalles_entradas.tipo_unidad',
                'detalles_entradas.valor_unidad',
                'categorias.nombre_categoria',
                'detalle_productos.nombre_producto',
                'marcas.nombre_marca',
                'productos.modelo',
                'productos.medida',
                'productos.color',
                'stocks.estado_conservacion',
                'detalles_entradas.created_at',
            )
            ->where('detalles_entradas.estado_activo', '=', '0')
            ->orderBy('detalles_entradas.created_at', 'DESC')
            ->get();
    }
}
