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
        $categoria->create([
            'nombre_categoria' => $request->nombre_categoria,
            'descripcion' => $request->descripcion,
            'estado_activo' => $request->estado_activo
        ]);
    }

    public function show(Categoria $categoria)
    {
        return $categoria;
    }

    public function update(Request $request, $categoria)
    {
        $categoria = Categoria::find($categoria);
        $categoria->update($request->all());
        return $categoria;
    }

    public function destroy($categoria)
    {
        
    }
}
