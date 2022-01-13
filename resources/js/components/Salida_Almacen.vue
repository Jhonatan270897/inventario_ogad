<template>

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
            <table class="table table-bordered" id="datatable_salida" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Total asdasd</th>
                        <th>Denomasdasdasdinacion</th>
                        <th>Marasdasdasdca</th>
                        <th>Modelo</th>
                        <th>Descripcion</th>
                        <th>Color</th>
                        <th>Estado Conservación</th>
                        <th>Botones</th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <th>Categoría</th>
                        <th>Total Unidades</th>
                        <th>asdasd</th>
                        <th>Marca</th>
                        <th>asdasd</th>
                        <th>Descasdasdripcion</th>
                        <th>Color</th>
                        <th>Estado Conservación</th>
                        <th>asdasd</th>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>
</div>

</template>
<script>


export default {
    data(){
        return {
            stock:[],
        }
    },
    methods: {
        async listar(){
            $res=await axios.get('stock');
            this.articulos

        }
    }
}
</script>

<style>

</style>

