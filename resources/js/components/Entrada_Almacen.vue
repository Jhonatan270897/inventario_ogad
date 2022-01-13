<template>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row align-items-center">
            <div class="col-8">
                <h6 class="m-0 font-weight-bold text-primary">Entrada</h6>
            </div>
            <div class="col-4 text-right">
                <button type="button" class="btn btn-sm btn-primary">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable_entrada" width="100%" cellspacing="0">
                <thead>
                    <tr> 
                        <th>Categoría</th>
                        <th>Totaasdasdasd Unidades</th>
                        <th>Denominacion</th>
                        <th>Marcasdasdasda</th>
                        <th>Modeasdasdlo</th>
                        <th>Descripcion</th>
                        <th>Color</th>
                        <th>Estado Conservación</th>
                        <th>Botones</th>
                    </tr>
                </thead>
                <tbody>
                     <tr v-for="data in stock" :key="data.id">
                        <th scope="row">{{data.id}}</th>
                        <th>Total Unidades</th>
                        <th>Denominacion</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Descripcion</th>
                        <th>Color</th>
                        <th>Estado Conservación</th>
                        <th>Botones</th>
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
            entrada:[],
        }
    },
    methods: {
        async listar(){
            res=await axios.get('entrada');
            this.entrada=res.data;

        }
    }
}

</script>

<style>

</style>

