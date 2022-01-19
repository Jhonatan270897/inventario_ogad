<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{

    public function index()
    {
        return Marca::get();
    }
    public function store(Request $request)
    {
        $marca = new Marca;
        $marca->create([
            'nombre_marca' => $request->nombre_marca,
            'descripcion' => $request->descripcion,
            'estado_activo' => $request->estado_activo
        ]);
    }
    public function show(Marca $marca)
    {
        return $marca;        //
    }

    public function update(Request $request, Marca $marca)
    {
        $marca->update($request->all());
    }
    public function destroy(Marca $marca)
    {
        $marca->update($request->all());
    }
}
