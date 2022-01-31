@extends('layouts.main',['activePage' => 'salida', 'titlePage' => 'Salidas del Almacen'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Salidas del Almacen</h4>
                    <p class="card-category">Registro de las salidas del almacen</p>
                </div>
                <div class="card-body">
                    <salida_almacen />
                </div>
            </div>
        </div>
    </div>
</div>


@endsection