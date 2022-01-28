<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{

    public function index()
    {
        return Marca::orderBy('marcas.nombre_marca', 'ASC')->get();
    }
    public function store(Request $request)
    {
        $marca = new Marca;
        $marca->nombre_marca = trim($request->nombre_marca);
        $marca->descripcion = trim($request->descripcion);
        $marca->estado_activo = $request->estado_activo;
        $marca->save();
    }
    public function show(Marca $marca)
    {
        return $marca;        //
    }

    public function update(Request $request, Marca $marca)
    {
        $marca->nombre_marca = trim($request->nombre_marca);
        $marca->descripcion = trim($request->descripcion);
        $marca->estado_activo = $request->estado_activo;
        $marca->save();
    }
    public function destroy(Marca $marca)
    {
        $marca->delete();
    }
}
