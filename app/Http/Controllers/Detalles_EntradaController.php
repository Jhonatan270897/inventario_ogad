<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalles_Entrada;


class Detalles_EntradaController extends Controller
{
    public function index()
    {
        $detalles_entrada = new Detalles_Entrada();
        return $detalles_entrada::join('entrada_almacens', 'entrada_almacens.id', '=', 'detalles_entradas.id_entrada_almacen')
            ->join('users', 'users.id', '=', 'entrada_almacens.id_usuario')
            ->join('productos', 'productos.id', '=', 'detalles_entradas.id_producto')
            ->join('detalle_productos', 'detalle_productos.id', '=', 'productos.id_detalle_producto')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select(
                'detalles_entradas.id AS idde',
                'entrada_almacens.ruta',
                'categorias.nombre_categoria',
                'detalles_entradas.tipo_unidad',
                'detalles_entradas.valor_unidad',
                'detalles_entradas.cantidad_unidad',
                'detalle_productos.nombre_producto',
                'marcas.nombre_marca',
                'productos.modelo',
                'productos.medida',
                'productos.color',
                'detalles_entradas.created_at',
                'entrada_almacens.detalles as d_entrada',
                'detalles_entradas.estado_conservacion',
                'users.name'
            )
            ->where('detalles_entradas.estado_activo', '=', '0')
            ->orderBy('detalles_entradas.created_at', 'DESC')
            ->get();
    }

    public function store(Request $request)
    {
        $detalles_entrada = new Detalles_Entrada();
        $detalles_entrada->tipo_unidad = $request->unidadMedida;
        $detalles_entrada->valor_unidad = $request->cantidadUnitaria;
        $detalles_entrada->cantidad_unidad = $request->cantidadProducto;
        $detalles_entrada->estado_conservacion = $request->estado_conservacion;
        $detalles_entrada->estado_activo = "0";
        $detalles_entrada->id_producto = $request->idp;
        $detalles_entrada->id_entrada_almacen = $request->idea;
        $detalles_entrada->save();
    }
    public function show($detalles_entrada)
    {
        $detalles_entrada = Detalles_Entrada::find($detalles_entrada);
        return $detalles_entrada;
    }
    public function update(Request $request, $detalles_entrada)
    {
        $detalles_entrada = Detalles_Entrada::find($detalles_entrada);
        $detalles_entrada->tipo_unidad = $request->tipo_unidad;
        $detalles_entrada->valor_unidad = $request->valor_unidad;
        $detalles_entrada->cantidad_unidad = $request->cantidad_unidad;
        $detalles_entrada->estado_conservacion = $request->estado_conservacion;
        $detalles_entrada->estado_activo = $request->estado_activo;
        $detalles_entrada->save();
    }

    public function destroy($detalles_entrada)
    {
        $detalles_entrada = Detalles_Entrada::find($detalles_entrada);
        $detalles_entrada->delete();
    }
}
