@extends('layouts.main',['activePage' => 'categoria', 'titlePage' => 'Categorias'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Categorias</h4>
                    <p class="card-category">Lista de categorias registradas en la base de datos</p>
                </div>
                <div class="card-body">
                    <categoria />
                </div>
            </div>
        </div>
    </div>
</div>


@endsection