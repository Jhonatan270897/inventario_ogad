<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalles_Entrada;
use Illuminate\Support\Facades\DB;

class Entrada_AlmacenController extends Controller
{
    public function index()
    {
        $detalles_entrada = Detalles_Entrada

            ::join('entrada_almacens', 'entrada_almacens.id', '=', 'detalles_entradas.id_entrada_almacen')
            ->join('users', 'users.id', '=', 'entrada_almacens.id_usuario')
            ->join('productos', 'productos.id', '=', 'detalles_entradas.id_producto')
            ->join('detalle_productos', 'detalle_productos.id', '=', 'productos.id_detalle_producto')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->join('categorias', 'categorias.id', '=', 'productos.id_marca')
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
        return $detalles_entrada;
    }

    public function store(Request $entrada_almacen)
    {
        try {
            DB::beginTransaction();
            $entrada_almacen = Employee::create([
                'name' => $request->employee_name,
                'email' => $request->employee_email
            ]);
            DB::afterCommit(function() use($employee){
                Mail::to($employee)->send(new EmployeeHired);
            });
            $position = Position::create([
                'name' => $request->position,
            ]);
            $position->employees()->save($employee);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        $entrada_almacen = new Entrada_Almacen;
        $entrada_almacen->create($request->all());
    }

    public function show(Entrada_Almacen $entrada_almacen)
    {
        return $entrada_almacen;
    }
    public function update(Request $request, Entrada_Almacen $entrada_almacen)
    {
        $entrada_almacen->update($request->all());
    }

    public function destroy(Entrada_Almacen $entrada_almacen)
    {
        //
    }
}
