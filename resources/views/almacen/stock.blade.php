@extends('layouts.main',['activePage' => 'almacen', 'titlePage' => 'Almacen'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Almacen</h4>
                    <p class="card-category">Lista de productos en Almacen</p>
                </div>
                <div class="card-body">
                    <stock />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection