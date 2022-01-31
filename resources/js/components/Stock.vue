<template>
    <!--Contenido pagina entrada -->
            <div class="table-responsive">
              <table
                class="table cell-border"
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
                    <th>Fecha de Creacion</th>
                    <th>Estado Conservación</th>
                    <th>Usuario</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="entrada in lista_stock" :key="entrada.id">
                    <td class="text-center">{{ entrada.d_entrada }}</td>
                    <td class="text-center">{{ entrada.nombre_categoria }}</td>
                    <td class="text-center">{{ entrada.cantidad_total }}</td>
                    <td class="text-center">
                      {{ entrada.tipo_unidad }} de
                      {{ entrada.valor_unidad }}
                    </td>
                    <td class="text-center">{{ entrada.nombre_producto }}</td>
                    <td class="text-center">{{ entrada.nombre_marca }}</td>
                    <td class="text-center">{{ entrada.modelo }}/{{ entrada.medida }}</td>
                    <td class="text-center">{{ entrada.color }}</td>
                    <td class="text-center">{{ entrada.created_at }}</td>
                    <td class="text-center">{{ entrada.estado_conservacion }}</td>
                    <td class="text-center">{{ entrada.name }}</td>
                  </tr>
                </tbody>
              </table>
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

