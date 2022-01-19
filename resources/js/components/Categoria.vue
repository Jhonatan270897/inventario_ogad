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
              id="btn-modal-add-categoria"
              class="btn btn-sm btn-primary"
              @click="
                modificarc = false;
                abrirModalc(categorias);
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
            id="datatable_categoria"
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
              <tr v-for="categoria in categorias" :key="categoria.id">
                <td>{{ categoria.nombre_categoria }}</td>
                <td>{{ categoria.descripcion }}</td>
                <td>
                  <div v-if="categoria.estado_activo == '0'">Activo</div>
                  <div v-else>Inactivo</div>
                </td>
                <td>
                  <button
                    type="button"
                    @click="
                      modificarc = true;
                      abrirModalc(categoria);
                    "
                    class="btn btn-warning btn-circle btn-sm"
                  >
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button
                    type="button"
                    @click="eliminarc(categoria)"
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
      id="modal-add-categoria"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal-notification"
      aria-hidden="true"
      :class="{ mostrar: modalc }"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title-notification">
              {{ opcion_categoria }} Categoria
            </h5>
            <button
              type="button"
              class="close"
              @click="cerrarModalc()"
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
                    id="idCategoria"
                    type="text"
                    v-model="categoria.nombre_categoria"
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
                    id="idDescripcionCategoria"
                    type="text"
                    v-model="categoria.descripcion"
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
                        v-model="categoria.estado_activo"
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
                        v-model="categoria.estado_activo"
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
              id="btn-modal-add-categoria"
              @click="guardarc()"
            >
              Guardar
            </button>
            <button type="button" class="btn ml-auto" @click="cerrarModalc()">
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
      modificarc: false,
      modalc: 0,
      opcion_categoria: "",
      categorias: [],
      categoria: {
        nombre_categoria: "",
        descripcion: "",
        estado_activo: "",
      },
    };
  },
  methods: {
    async listarc() {
      const res = await axios.get("/categoria");
      this.categorias = res.data;
    },
    async guardarc() {
      if (this.modificarc) {
        const res = await axios.put("/categoria/" + this.id, this.categoria);
      } else {
        const res = await axios.post("/categoria", this.categoria);
      }
      this.cerrarModalc();
      this.listarc();
    },
    async eliminarc(data = {}) {
      const res = await axios.delete("/categoria/", this.categoria);
      this.listarc();
    },
    abrirModalc(data = {}) {
      this.modalc = 1;
      if (this.modificarc) {
        this.id = data.id;
        this.opcion_categoria = "Modificar";
        this.categoria.nombre_categoria = data.nombre_categoria;
        this.categoria.descripcion = data.descripcion;
        this.categoria.estado_activo = data.estado_activo;
      } else {
        this.id = 0;
        this.opcion_categoria = "Agregar";
        this.categoria.nombre_categoria = "";
        this.categoria.descripcion = "";
        this.categoria.estado_activo = 0;
      }
    },
    cerrarModalc() {
      this.modalc = 0;
    },
  },
  created() {
    this.listarc();
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