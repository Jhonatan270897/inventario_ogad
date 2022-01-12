@extends('layouts.principal')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Stock del Inventario</h1>
<p class="mb-4">Puede consultar los productos actuales con los que se cuenta.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="m-0 font-weight-bold text-primary">Inventario</h6>
            </div>
            <div class="col-4 text-right">
                <button type="button" class="btn btn-sm btn-primary">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable_stock" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Total Unidades</th>
                        <th>Denominacion</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Descripcion</th>
                        <th>Color</th>
                        <th>Estado Conservación</th>
                        <th>Botones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $inventario)
                    @if ($inventario->productos->estado_activo == '0')
                    <tr>
                        <td>{{$inventario->productos->categorias->nombre_categoria}}</td>
                        <td>{{$inventario->cantidad}}</td>
                        <td>{{$inventario->productos->nombre_producto}}</td>
                        <td>{{$inventario->productos->marcas->nombre_marca}}</td>
                        <th>{{$inventario->productos->modelo}}</th>
                        <th>{{$inventario->productos->descripcion}}</th>
                        <th>{{$inventario->productos->color}}</th>
                        <th>{{$inventario->estado_conservacion}}</th>
                        <th>Agregar - Eliminar</th>
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection