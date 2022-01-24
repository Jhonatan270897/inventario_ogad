<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    public function index()
    {
        return Categoria::get();
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre_categoria = strtoupper($request->nombre_categoria);
        $categoria->descripcion = strtoupper($request->descripcion);
        $categoria->estado_activo = $request->estado_activo;
        $categoria->save();
    }

    public function show($categoria)
    {
        $categoria = Categoria::find($categoria);
        return $categoria;
    }

    public function update(Request $request, $categoria)
    {
        $categoria = Categoria::find($categoria);
        $categoria->nombre_categoria = strtoupper($request->nombre_categoria);
        $categoria->descripcion = strtoupper($request->descripcion);
        $categoria->estado_activo = $request->estado_activo;
        $categoria->save();
    }

    public function destroy($categoria)
    {
        $categoria = Categoria::find($categoria);
        $categoria->delete();
    }
}
