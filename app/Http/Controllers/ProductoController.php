<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function index()
    {
        return Producto::get();
    }

    public function store(Request $request)
    {
        //
    }
    public function show($producto)
    {
        //
    }

    public function update(Request $request, $producto)
    {
        //
    }

    public function destroy($producto)
    {
        //
    }
}
