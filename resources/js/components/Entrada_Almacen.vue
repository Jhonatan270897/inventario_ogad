<template>
  <div>
    <!--Contenido pagina entrada -->
    <div class="row">
      <div class="col-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row align-items-center">
              <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
              </div>
              <div class="col-6 text-right">
                <button
                  type="button"
                  class="btn btn-sm btn-primary"
                  @click="
                    modificarde = false;
                    guardarde();
                  "
                >
                  Guardar
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <form action="">
                  <label>Detalles del ingreso</label>
                  <input
                    type="textarea"
                    class="form-control bg-light border-0 small"
                    placeholder="Detalles"
                    v-model="entrada.detalles"
                  />
                </form>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-6 text-left">
                <button type="file" class="btn btn-sm btn-primary">
                  Subir PDF
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row align-items-center">
              <div class="col-4">
                <h6 class="m-0 font-weight-bold text-primary">
                  Productos a ingresar
                </h6>
              </div>
              <div class="col-8 text-right">
                <button
                  type="button"
                  id="btn-modal-producto"
                  class="btn btn-sm btn-primary"
                  @click="
                    modificardp = false;
                    abrirModalp();
                  "
                >
                  Agregar a la lista
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table"
                id="datatable_temp"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Tipo Unidad</th>
                    <th>Denominacion</th>
                    <th>Marca</th>
                    <th>Modelo/Medida</th>
                    <th>Color</th>
                    <th>Estado Conservación</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="ptemp in lista_guardar_producto"
                    :key="ptemp.idtemp"
                  >
                    <td>
                      {{ mostrarNombre(lista_categoria, "c", ptemp.idc) }}
                    </td>
                    <td>{{ ptemp.cantidadProducto }}</td>
                    <td>
                      {{ ptemp.unidadMedida }} de
                      {{ ptemp.cantidadUnitaria }}
                    </td>
                    <td>
                      {{
                        mostrarNombre(lista_detalle_producto, "p", ptemp.iddp)
                      }}
                    </td>
                    <td>{{ mostrarNombre(lista_marca, "m", ptemp.idm) }}</td>
                    <td>{{ ptemp.modelo }}/{{ ptemp.medida }}</td>
                    <td>{{ ptemp.color }}</td>
                    <td>{{ ptemp.estado_conservacion }}</td>
                    <td>
                      <button
                        type="button"
                        @click="
                          eliminarProducto(lista_guardar_producto, ptemp.idtemp)
                        "
                        class="btn btn-danger btn-circle btn-sm"
                      >
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="m-0 font-weight-bold text-primary">
                  Lista de productos ingresados.
                </h6>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table"
                id="datatable_entrada"
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
                    <th style="width: 5%">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="entrada in lista_detalle_entrada"
                    :key="entrada.id"
                  >
                    <td>{{ entrada.d_entrada }}</td>
                    <td>{{ entrada.nombre_categoria }}</td>
                    <td>{{ entrada.cantidad_unidad }}</td>
                    <td>
                      {{ entrada.tipo_unidad }} de
                      {{ entrada.valor_unidad }}
                    </td>
                    <td>{{ entrada.nombre_producto }}</td>
                    <td>{{ entrada.nombre_marca }}</td>
                    <td>{{ entrada.modelo }}/{{ entrada.medida }}</td>
                    <td>{{ entrada.color }}</td>
                    <td>{{ entrada.created_at }}</td>
                    <td>{{ entrada.estado_conservacion }}</td>
                    <td>{{ entrada.name }}</td>
                    <td>
                      <button
                        type="button"
                        @click="
                          modificarde = true;
                          abrirModalde(entrada);
                        "
                        class="btn btn-warning btn-circle btn-sm"
                      >
                         <i class="material-icons">edit</i>
                      </button>
                      <button
                        type="button"
                        @click="eliminarde(entrada)"
                        class="btn btn-danger btn-circle btn-sm"
                      >
                         <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal"
      id="modal-add-producto"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal-notification"
      aria-hidden="true"
      :class="{ mostrar: modalp }"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title-notification">
              {{ opcion_producto }} Producto
            </h5>
            <button
              type="button"
              class="close"
              aria-label="Close"
              @click="cerrarModalp()"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-10">
                <div class="form-group">
                  <label class="form-control-label"
                    >Productos<span class="is-required">*</span></label
                  >
                  <select
                    class="form-control"
                    required
                    v-model="cbxproduc"
                    @change="rellenarDatosProducto(cbxproduc)"
                    :disabled="!isDisabled"
                  >
                    <option value="0">--Seleccionar--</option>
                    <option
                      v-for="prod in lista_producto"
                      :key="prod.idp"
                      :value="prod"
                    >
                      <div v-if="prod.estado_activo == 0">
                        {{ prod.nombre_categoria }}/ {{ prod.nombre_producto }}/
                        {{ prod.nombre_marca }}/ {{ prod.color }}/
                        {{ prod.modelo }}/
                        {{ prod.medida }}
                      </div>
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-2">
                <br />
                <button
                  type="button"
                  class="btn btn-primary"
                  id="btn-nuevo-prod-temp"
                  @click="registrarNuevoProd()"
                >
                  {{ nombreBtn }}
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <br />
                  <label class="form-control-label"
                    >Nombre producto<span class="is-required">*</span></label
                  >
                  <select
                    class="form-control"
                    v-model="producto.iddp"
                    :disabled="isDisabled"
                  >
                    <option value="0">--Seleccionar--</option>
                    <option
                      v-for="detalle_producto in lista_detalle_producto"
                      :key="detalle_producto.id"
                      :value="detalle_producto.id"
                    >
                      {{ detalle_producto.nombre_producto }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="form-control-label"
                    >Cantidad <span class="is-required">*</span></label
                  >
                  <br />
                  <label> </label>
                  <input
                    class="form-control"
                    id="idCantidadIngresoProducto"
                    type="number"
                    v-model="producto.cantidadProducto"
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="form-control-label"
                    >Unidad Medida<span class="is-required">*</span></label
                  >
                  <br>
                  <select
                    class="form-control"
                    required
                    v-model="producto.unidadMedida"
                  >
                    <option value="">--Seleccionar--</option>
                    <option
                      v-for="um in lista_unidad_medida"
                      :key="um.nombre_um"
                      :value="um.nombre_um"
                    >
                      {{ um.nombre_um }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="form-control-label"
                    >Cantidad Unitaria<span class="is-required">*</span></label
                  >
                  <input
                    class="form-control"
                    id="idCantidadUnitariaproducto"
                    type="number"
                    v-model="producto.cantidadUnitaria"
                  />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label"
                    >Categoría<span class="is-required">*</span></label
                  >
                  <select
                    class="form-control"
                    required
                    v-model="producto.idc"
                    :disabled="isDisabled"
                  >
                    <option value="0">--Seleccionar--</option>
                    <option
                      v-for="categoria in lista_categoria"
                      :key="categoria.id"
                      :value="categoria.id"
                    >
                      {{ categoria.nombre_categoria }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label"
                    >Marca<span class="is-required">*</span></label
                  >
                  <select
                    class="form-control"
                    required
                    v-model="producto.idm"
                    :disabled="isDisabled"
                  >
                    <option value="0">--Seleccionar--</option>
                    <option
                      v-for="marca in lista_marca"
                      :key="marca.id"
                      :value="marca.id"
                    >
                      {{ marca.nombre_marca }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label">Color</label>
                  <select
                    class="form-control"
                    required
                    v-model="producto.color"
                    :disabled="isDisabled"
                  >
                    <option value="">--Seleccionar--</option>
                    <option
                      v-for="color in lista_color"
                      :key="color.nombre_color"
                      :value="color.nombre_color"
                    >
                      {{ color.nombre_color }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label">Modelo</label>
                  <input
                    class="form-control"
                    id="idModeloProducto"
                    type="text"
                    v-model="producto.modelo"
                    :disabled="isDisabled"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label">Medida</label>
                  <input
                    class="form-control"
                    id="idMedidaProducto"
                    type="text"
                    v-model="producto.medida"
                    :disabled="isDisabled"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label"
                    >Estado de Conservacion</label
                  >
                  <select
                    class="form-control"
                    required
                    v-model="producto.estado_conservacion"
                  >
                    <option value="">--Seleccionar--</option>
                    <option
                      v-for="ec in lista_ec"
                      :key="ec.nombre_ec"
                      :value="ec.nombre_ec"
                    >
                      {{ ec.nombre_ec }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-primary"
              id="btn-modal-agregar_producto"
              @click="agregarProducto()"
            >
              Guardar
            </button>
            <button type="button" class="btn ml-auto" @click="cerrarModalp()">
              Cancelar
            </button>
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
      isDisabled: true,
      nombreBtn: "Editar",
      idtemp: 0,
      idp: 0,
      idde: 0,
      modificarp: false,
      modificarde: false,
      modalde: 0,
      modalp: 0,
      opcion_producto: "",
      opcion_stock: "",
      /*Listas cbx */
      cbxproduc: {},
      lista_detalle_producto: {},
      lista_producto: {},
      lista_categoria: {},
      lista_marca: {},
      lista_ec: [{ nombre_ec: "Abierto" }, { nombre_ec: "Sellado" }],
      lista_unidad_medida: [
        { nombre_um: "Unidad" },
        { nombre_um: "Caja" },
        { nombre_um: "Paquete" },
      ],
      lista_color: [
        { nombre_color: "Azul" },
        { nombre_color: "Rojo" },
        { nombre_color: "Multicolor" },
        { nombre_color: "Blanco" },
        { nombre_color: "Rosado" },
        { nombre_color: "Amarillo" },
        { nombre_color: "Verde" },
        { nombre_color: "Celeste" },
        { nombre_color: "Melon" },
        { nombre_color: "Naranja" },
        { nombre_color: "Crema" },
        { nombre_color: "Negro" },
        { nombre_color: "Cian" },
        { nombre_color: "Magenta" },
        { nombre_color: "Plomo" },
        { nombre_color: "Plateado" },
        { nombre_color: "Trasparente" },
        { nombre_color: "Cristalina" },
        { nombre_color: "Marron" },
      ],
      /*Lista de creacion de tablas */
      lista_guardar_producto: [],
      lista_detalle_entrada: [],
      /*Datos de formularios */
      producto: {
        idc: 0,
        idp: 0,
        idm: 0,
        iddp: 0,
        unidadMedida: "",
        cantidadUnitaria: 0,
        cantidadProducto: 0,
        modelo: "",
        color: "",
        medida: "",
        estado_conservacion: "",
        idtemp: 1,
      },
      entrada: {
        idde: 0,
        idea: 0,
        idp: 0,
        ruta: "",
        nombre_categoria: "",
        tipo_unidad: "",
        valor_unidad: 0,
        cantidad_unidad: 0,
        nombre_producto: "",
        nombre_marca: "",
        modelo: "",
        medida: "",
        color: "",
        detalles: "",
        estado_conservacion: "",
        name: "",
      },
    };
  },
  methods: {
    /*Crud*/
    async listarde() {
      const res = await axios.get("/entrada");
      this.lista_detalle_entrada = res.data;
    },
    async guardarde() {
      if (this.lista_guardar_producto.length !== 0) {
        const res1 = await axios.post("/ent", this.entrada);
        for (
          let index = 0;
          index < this.lista_guardar_producto.length;
          index++
        ) {
          if (this.lista_guardar_producto[index].idp == 0) {
            const res2 = await axios.post(
              "/producto",
              this.lista_guardar_producto[index]
            );
            this.lista_guardar_producto[index].idp = res2.data;
          }
          this.lista_guardar_producto[index].idea = res1.data;
          const res3 = await axios.post(
            "/entrada",
            this.lista_guardar_producto[index]
          );
          /*Ingresar detalle_producto*/
        }
        this.reset_insertGeneral();
      } else {
        window.alert("Vacioooooo");
      }
    },

    registrarNuevoProd() {
      if (this.isDisabled) {
        this.isDisabled = false;
        this.nombreBtn = "Volver";
        this.producto.idp = 0;
        this.cbxproduc = "0";
      } else {
        this.isDisabled = true;
        this.nombreBtn = "Nuevo";
        this.reset_temp();
      }
    },
    showCamposCompletos(info) {
      this.$swal({
        position: "top-end",
        icon: "info",
        title: info,
        showConfirmButton: false,
        timer: 1500,
      });
    },
    agregarProducto() {
      if (
        this.producto.iddp == 0 ||
        this.producto.idc == 0 ||
        this.producto.idm == 0 ||
        this.producto.cantidadProducto == 0 ||
        this.producto.cantidadUnitaria == 0 ||
        this.producto.unidadMedida == ""
      ) {
        this.showCamposCompletos("Por favor rellene los campos requeridos");
      } else {
        this.lista_guardar_producto.push({
          idea: 0,
          idc: this.producto.idc,
          idp: this.producto.idp,
          idm: this.producto.idm,
          iddp: this.producto.iddp,
          modelo: this.producto.modelo,
          color: this.producto.color,
          medida: this.producto.medida,
          estado_conservacion: this.producto.estado_conservacion,
          idtemp: this.idtemp,
          unidadMedida: this.producto.unidadMedida,
          cantidadUnitaria: this.producto.cantidadUnitaria,
          cantidadProducto: this.producto.cantidadProducto,
        });
        this.producto.idtemp = Number(this.producto.idtemp) + 1;
        this.cerrarModalp();
      }
    },
    async eliminarde(data) {
      const res = await axios.delete("/entrada/" + data.idde, data);
      this.listarde();
    },
    eliminarProducto(arry = [], id) {
      arry.forEach(function (currentValue, index, arr) {
        if (arry[index].idtemp == id) {
          arry.splice(index, 1);
        }
      });
    },

    rellenarDatosProducto(cbx) {
      if (cbx == "0") {
        this.reset_temp();
      } else {
        this.producto.idc = cbx.idc;
        this.producto.idp = cbx.idp;
        this.producto.idm = cbx.idm;
        this.producto.iddp = cbx.iddp;
        this.producto.modelo = cbx.modelo;
        this.producto.color = cbx.color;
        this.producto.medida = cbx.medida;
      }
      console.log(this.idtemp);
    },
    /*Limpiar*/
    reset_temp() {
      this.producto.idc = 0;
      this.producto.idp = 0;
      this.producto.idm = 0;
      this.producto.iddp = 0;
      this.producto.modelo = "";
      this.producto.color = "";
      this.producto.medida = "";
    },
    reset_producto() {
      this.reset_temp();
      this.producto.unidadMedida = "";
      this.producto.estado_conservacion = "";
      this.producto.cantidadUnitaria = 0;
      this.producto.cantidadProducto = 0;
    },
    reset_insertGeneral() {
      this.entrada.ruta = "";
      this.entrada.detalles = "";
      this.lista_guardar_producto = [];
      this.listarde();
    },
    reset_entrada() {
      this.entrada = {
        idde: 0,
        ruta: "",
        nombre_categoria: "",
        tipo_unidad: "",
        valor_unidad: 0,
        cantidad_unidad: 0,
        nombre_producto: "",
        nombre_marca: "",
        modelo: "",
        medida: "",
        color: "",
        created_at: "",
        d_entrada: "",
        estado_conservacion: "",
        name: "",
      };
    },

    /*Funciones*/

    mostrarNombre: function (arr = [], e, id) {
      switch (e) {
        case "c":
          return arr.find((dev) => dev.id === id).nombre_categoria;
          breack;
        case "p":
          return arr.find((dev) => dev.id === id).nombre_producto;
          breack;
        case "m":
          return arr.find((dev) => dev.id === id).nombre_marca;
          breack;
        default:
          return "No encontrado";
      }
    },
    /*Modales*/

    abrirModalp(data = {}) {
      this.modalp = 1;
      if (this.modificarp) {
        this.idp = data.id;
        this.opcion_producto = "Modificar";
        this.producto.iddp = data.iddp;
      } else {
        this.idp = 0;
        this.cbxproduc = "0";
        this.opcion_producto = "Agregar";
        this.reset_producto();
        this.idtemp = this.producto.idtemp;
      }
    },
    cerrarModalp() {
      this.modalp = 0;
      this.reset_producto();
      this.cbxproduc = 0;
      this.isDisabled = true;
      this.idtemp = 0;
    },
  },
  mounted() {
    axios.get("producto").then((response) => {
      this.lista_producto = response.data;
    });
    axios.get("detalle_producto").then((response) => {
      this.lista_detalle_producto = response.data;
    });
    axios.get("categoria").then((response) => {
      this.lista_categoria = response.data;
    });
    axios.get("marca").then((response) => {
      this.lista_marca = response.data;
    });
  },
  created() {
    this.listarde();
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

