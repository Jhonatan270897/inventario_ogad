<?php

use App\Http\Controllers\AlmacenController;

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $inventarios = Stock::all();
        return view('welcome', compact('inventarios'));
    }
}
