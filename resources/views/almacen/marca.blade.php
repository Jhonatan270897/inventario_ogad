@extends('layouts.main',['activePage' => 'marca', 'titlePage' => 'Marca'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Marcas</h4>
                    <p class="card-category">Lista de marcas registradas en la base de datos</p>
                </div>
                <div class="card-body">
                    <marca />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection