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
              id="btn-modal-add-marca"
              class="btn btn-sm btn-primary"
              @click="
                modificarm = false;
                abrirModalm(marcas);
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
            id="datatable_marca"
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
              <tr v-for="marca in marcas" :key="marca.id">
                <td>{{ marca.nombre_marca }}</td>
                <td>{{ marca.descripcion }}</td>
                <td>
                  <div v-if="marca.estado_activo == '0'">Activo</div>
                  <div v-else>Inactivo</div>
                </td>
                <td>
                  <button
                    type="button"
                    @click="
                      modificarm = true;
                      abrirModalm(marca);
                    "
                    class="btn btn-warning btn-circle btn-sm"
                  >
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button
                    type="button"
                    @click="eliminarm(marca)"
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
      id="modal-add-marca"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal-notification"
      aria-hidden="true"
      :class="{ mostrar: modalm }"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title-notification">
              {{ opcion_marca }} Marca
            </h5>
            <button
              type="button"
              class="close"
              @click="cerrarModalm()"
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
                    id="idMarca"
                    type="text"
                    v-model="marca.nombre_marca"
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
                    id="idDescripcionMarca"
                    type="text"
                    v-model="marca.descripcion"
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
                        v-model="marca.estado_activo"
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
                        v-model="marca.estado_activo"
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
              id="btn-modal-add-marca"
              @click="guardarm()"
            >
              Guardar
            </button>
            <button type="button" class="btn ml-auto" @click="cerrarModalm()">
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
      modificarm: false,
      modalm: 0,
      opcion_marca: "",
      marcas: [],
      marca: {
        nombre_marca: "",
        descripcion: "",
        estado_activo: "",
      },
    };
  },
  methods: {
    async listarm() {
      const res = await axios.get("/marca");
      this.marcas = res.data;
    },
    async guardarm() {
      if (this.modificarm) {
        const res = await axios.put("/marca/" + this.id, this.marca);
      } else {
        const res = await axios.post("/marca", this.marca);
      }
      this.cerrarModalm();
      this.listarm();
    },
    async eliminarm(data = {}) {
      const res = await axios.put("/marca/" + data.id, {});
      this.listarm();
    },
    abrirModalm(data = {}) {
      this.modalm = 1;
      if (this.modificarm) {
        this.id = data.id;
        this.opcion_marca = "Modificar";
        this.marca.nombre_marca = data.nombre_marca;
        this.marca.descripcion = data.descripcion;
        this.marca.estado_activo = data.estado_activo;
      } else {
        this.id = 0;
        this.opcion_marca = "Agregar";
        this.marca.nombre_marca = "";
        this.marca.descripcion = "";
        this.marca.estado_activo = 0;
      }
    },
    cerrarModalm() {
      this.modalm = 0;
    },
  },
  created() {
    this.listarm();
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