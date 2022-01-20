<template>
  <div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row align-items-center">
          <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary">Inventario</h6>
          </div>
          <div class="col-4 text-right">
            <button
              type="button"
              id="btn-modal-add-detalle-producto"
              class="btn btn-sm btn-primary"
              @click="
                modificardp = false;
                abrirModaldp(detalle_producto);
              "
            >
              Agregar
            </button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered"
            id="datatable_detalle_producto"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th style="width: 10%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="producto in detalle_productos" :key="producto.id">
                <td>{{ producto.nombre_producto }}</td>
                <td>{{ producto.descripcion }}</td>
                <td>
                  <div v-if="producto.estado_activo == '0'">Activo</div>
                  <div v-else>Inactivo</div>
                </td>
                <td>
                  <button
                    type="button"
                    @click="
                      modificardp = true;
                      abrirModaldp(producto);
                    "
                    class="btn btn-warning btn-circle btn-sm"
                  >
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button
                    type="button"
                    @click="eliminardp(producto)"
                    class="btn btn-danger btn-circle btn-sm"
                  >
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div
      class="modal"
      id="modal-add-detalle_producto"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal-notification"
      aria-hidden="true"
      :class="{ mostrar: modaldp }"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title-notification">
              {{ opcion_detalle_producto }} Producto
            </h5>
            <button
              type="button"
              class="close"
              @click="cerrarModaldp()"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label"
                    >Nombre<span class="is-required">*</span></label
                  >
                  <input
                    class="form-control"
                    id="idDetalleProducto"
                    type="text"
                    v-model="detalle_producto.nombre_producto"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label"
                    >Detalles<span class="is-required">*</span></label
                  >
                  <input
                    class="form-control"
                    id="idDescripcion"
                    type="text"
                    v-model="detalle_producto.descripcion"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label"
                    >Estado<span class="is-required">*</span></label
                  >
                  <div>
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        id="active"
                        name="customRadioInline"
                        class="custom-control-input"
                        value="0"
                        v-model="detalle_producto.estado_activo"
                      />
                      <label class="custom-control-label" for="active"
                        >Habilitado</label
                      >
                    </div>
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        id="disabled"
                        name="customRadioInline"
                        class="custom-control-input"
                        value="1"
                        v-model="detalle_producto.estado_activo"
                      />
                      <label class="custom-control-label" for="disabled"
                        >Deshabilitado</label
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-primary"
              id="btn-modal-add-detalle-producto"
              @click="guardardp()"
            >
              Guardar
            </button>
            <button type="button" class="btn ml-auto" @click="cerrarModaldp()">
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
/*Variables globales */

export default {
  data: function () {
    return {
      id: 0,
      modificardp: false,
      modaldp: 0,
      opcion_detalle_producto: "",
      detalle_productos: [],
      detalle_producto: {
        nombre_producto: "",
        descripcion: "",
        estado_activo: "",
      },
    };
  },
  methods: {
    async listardp() {
      const res = await axios.get("/detalle_producto");
      this.detalle_productos = res.data;
    },
    async guardardp() {
      if (this.modificardp) {
        const res = await axios.put(
          "/detalle_producto/" + this.id,
          this.detalle_producto
        );
      } else {
        const res = await axios.post(
          "/detalle_producto",
          this.detalle_producto
        );
      }
      this.cerrarModaldp();
      this.listardp();
    },
    async eliminardp(data = {}) {
      const res = await axios.delete("/detalle_producto/" + data.id, data);
      this.listardp();
    },
    abrirModaldp(data = {}) {
      this.modaldp = 1;
      if (this.modificardp) {
        this.id = data.id;
        this.opcion_detalle_producto = "Modificar";
        this.detalle_producto.nombre_producto = data.nombre_producto;
        this.detalle_producto.descripcion = data.descripcion;
        this.detalle_producto.estado_activo = data.estado_activo;
      } else {
        this.id = 0;
        this.opcion_detalle_producto = "Agregar";
        this.detalle_producto.nombre_producto = "";
        this.detalle_producto.descripcion = "";
        this.detalle_producto.estado_activo = 0;
      }
    },
    cerrarModaldp() {
      this.modaldp = 0;
    },
  },
  created() {
    this.listardp();
  },
};
</script>

<style>
.mostrar {
  display: list-item;
  opacity: 1;
  background: rgba(37, 37, 39, 0.847);
}
</style>