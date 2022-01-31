@extends('layouts.main',['activePage' => 'entrada', 'titlePage' => 'Entrada'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Entrada Almacen</h4>
                    <p class="card-category">Lista de productos en el almacen</p>
                </div>
                <div class="card-body">
                    <entrada_almacen />
                </div>
            </div>
        </div>
    </div>
</div>


@endsection