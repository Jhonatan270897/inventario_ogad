@extends('layouts.main',['activePage' => 'producto', 'titlePage' => 'Entrada'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Productos</h4>
                    <p class="card-category">Lists de productos registradas en las bases de datos</p>
                </div>
                <div class="card-body">
                    <detalle_producto />
                </div>
            </div>
        </div>
    </div>
</div>


@endsection