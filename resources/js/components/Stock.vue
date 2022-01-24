<template>
  <div>
    <!--Contenido pagina entrada -->
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="m-0 font-weight-bold text-primary">kardex.</h6>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table table-bordered"
                id="datatable_stock"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
                    <th>Detalle General</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Medida</th>
                    <th>Denominacion</th>
                    <th>Marca</th>
                    <th>Modelo/Medida</th>
                    <th>Color</th>
                    <th>Fecha</th>
                    <th>Estado Conservación</th>
                    <th>Usuario</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="entrada in lista_stock" :key="entrada.id">
                    <td>{{ entrada.d_entrada }}</td>
                    <td>{{ entrada.nombre_categoria }}</td>
                    <td>{{ entrada.cantidad_total }}</td>
                    <td>
                      {{ entrada.tipo_unidad }} DE
                      {{ entrada.valor_unidad }} UNIDADES
                    </td>
                    <td>{{ entrada.nombre_producto }}</td>
                    <td>{{ entrada.nombre_marca }}</td>
                    <td>{{ entrada.modelo }}/{{ entrada.medida }}</td>
                    <td>{{ entrada.color }}</td>
                    <td>{{ entrada.created_at }}</td>
                    <td>{{ entrada.estado_conservacion }}</td>
                    <td>{{ entrada.name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      lista_stock: [],
    };
  },
  methods: {
    /*Crud*/
    async listarCard() {
      const res = await axios.get("/stock");
      this.lista_stock = res.data;
    },
  },
  created() {
    this.listarCard();
  },
};
</script>

<style>
</style>

