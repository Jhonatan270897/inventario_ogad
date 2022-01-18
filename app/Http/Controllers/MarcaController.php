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
        //
    }
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
