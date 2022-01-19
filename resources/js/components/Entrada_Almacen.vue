<template>
  <div>
    <!--Contenido pagina entrada -->
    <div class="row">
      <div class="col-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row align-items-center">
              <div class="col-12">
                <h6 class="m-0 font-weight-bold text-primary">Generalidades</h6>
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
                  />
                </form>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-6 text-left">
                <button type="button" class="btn btn-sm btn-primary">
                  Subir PDF
                </button>
              </div>
              <div class="col-6 text-right">
                <button type="button" class="btn btn-sm btn-primary">
                  Guardar
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
              <div class="col-8">
                <h6 class="m-0 font-weight-bold text-primary">
                  Productos a ingresar
                </h6>
              </div>
              <div class="col-4 text-right">
                <button
                  type="button"
                  id="btn-modal-producto"
                  class="btn btn-sm btn-primary"
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
                id="datatable_temp"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Cantidad</th>
                    <th>Denominacion</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripcion</th>
                    <th>Color</th>
                    <th>Estado Conservación</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody></tbody>
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
                class="table table-bordered"
                id="datatable_entrada"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
                    <th>Detalle General</th>
                    <th>Categoria</th>
                    <th>Medida</th>
                    <th>Cantidad</th>
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
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="modal-add-producto"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal-notification"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title-notification">
              Agregar Producto
            </h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label class="form-control-label"
                    >Productos<span class="is-required">*</span></label
                  >
                  <select
                    class="form-control"
                    required
                    v-model="producto.idp"
                    @change="rellenarDatosProducto(producto)"
                  >
                    <option value="0">--Seleccionar--</option>
                    <option
                      v-for="prod in lista_producto"
                      :key="prod.idp"
                      :value="prod.idp"
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
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label"
                    >Nombre producto<span class="is-required">*</span></label
                  >
                  <select class="form-control" required v-model="producto.iddp">
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
                    >Unidad Medida<span class="is-required">*</span></label
                  >
                  <select
                    class="form-control"
                    required
                    v-model="producto.unidadMedida"
                  >
                    <option value="0">--Seleccionar--</option>
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
                    type="text"
                    v-model="producto.cantidadUnitaria"
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="form-control-label"
                    >Cantidad<span class="is-required">*</span></label
                  >
                  <input
                    class="form-control"
                    id="idCantidadIngresoProducto"
                    type="text"
                    v-model="producto.cantidadProducto"
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
                  <select class="form-control" required v-model="producto.idc">
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
                  <select class="form-control" required v-model="producto.idm">
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
                  <label class="form-control-label"
                    >Color<span class="is-required">*</span></label
                  >
                  <select
                    class="form-control"
                    required
                    v-model="producto.color"
                  >
                    <option value="NINGUNO">--Seleccionar--</option>
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
                    <option value="NINGUNO">--Seleccionar--</option>
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
            >
              Guardar
            </button>
            <button type="button" class="btn ml-auto" data-bs-dismiss="modal">
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- -->
    <div
      class="modal fade"
      id="modal-delete-producto"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal-notification"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title-notification">
              Se requiere su atención
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="fas fa-bell fa-4x"></i>
              <h4 class="heading mt-4">¿Estas seguro?</h4>
              <p>
                La frecuencia
                <strong><u id="ModalFrecuenciaEliminarNombres"></u></strong>
                será eliminada.<br />
                Este proceso no podrá ser revertido.
              </p>
            </div>
          </div>
          <div class="modal-footer">
            <input
              type="hidden"
              id="ModalFrecuenciaEliminarIdFrecuencia"
              value="0"
            />
            <button
              type="button"
              class="btn btn-danger"
              id="ModalFrecuenciaEliminarAceptar"
            >
              Eliminar
            </button>
            <button type="button" class="btn ml-auto" data-dismiss="modal">
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
let dte;

export default {
  data: function () {
    return {
      lista_producto: {},
      lista_categoria: {},
      lista_marca: {},
      lista_detalle_producto: {},
      lista_ec: [{ nombre_ec: "SELLADO" }],
      lista_unidad_medida: [
        { nombre_um: "UNIDAD" },
        { nombre_um: "CAJA" },
        { nombre_um: "PAQUETE" },
      ],
      lista_color: [
        { nombre_color: "AZUL" },
        { nombre_color: "ROJO" },
        { nombre_color: "MULTICOLOR" },
        { nombre_color: "BLANCO" },
        { nombre_color: "ROSADO" },
        { nombre_color: "AMARILLO" },
        { nombre_color: "VERDE" },
        { nombre_color: "CELESTE" },
        { nombre_color: "MELON" },
        { nombre_color: "NARANJA" },
        { nombre_color: "CREMA" },
        { nombre_color: "NEGRO" },
        { nombre_color: "CIAN" },
        { nombre_color: "MAGENTA" },
        { nombre_color: "PLOMO" },
        { nombre_color: "PLATEADO" },
        { nombre_color: "TRANSPARENTE" },
        { nombre_color: "CRISTALINA" },
        { nombre_color: "MARRON" },
      ],
      lista_guardar_producto: [],
      opcion_producto: "",
      opcion_stock: "",
      producto: {
        idProducto: 0,
        idDetalleProducto: 0,
        unidadMedida: "",
        cantidadUnitaria: 0,
        cantidadProducto: 0,
        idCategoria: 0,
        idMarca: 0,
        modelo: "",
        color: "",
        medida: "",
        estado_conservacion: "",
      },
      stock: {
        id: 0,
        cantidad: 0,
        estado_conservacion: "",
        id_producto: 0,
        nombre_producto: "",
        color: "",
        modelo: "",
        detalles: "",
        estado_activo: 0,
        id_marca: 0,
        id_categoria: 0,
        nombre_marca: "",
        descripcion: "",
        nombre_categoria: "",
      },
    };
  },
  methods: {
    rellenarDatosProducto(producto) {
      if (producto.idp == 0) {
        this.reset_producto();
      } else {
        this.consultarp(producto);
      }
    },
    async consultarp(producto) {
      const res = await axios.get("/producto", producto);
      this.producto = res.data[0];
    },
    guardarProducto() {
      this.lista_guardar_producto.push(this.producto);
    },
    mostrarProducto() {
      return this.lista_guardar_producto;
    },
    reset_producto() {
      this.producto = {
        idc: 0,
        idp: 0,
        idm: 0,
        iddp: 0,
        unidadMedida: "",
        cantidadUnitaria: 0,
        cantidadProducto: 0,
        idCategoria: 0,
        modelo: "",
        color: "",
        medida: "",
        estado_conservacion: "",
      };
    },
    reset_stock() {
      this.stock = {
        idea: 0,
        idd: 0,
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
        created_at: "",
        d_entrada: "",
        estado_conservacion: "",
        name: "",
      };
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
  computed: {
    prodFiltrado: function () {
      return this.lista_producto.filter(function (prod) {
        return;
      });
    },
  },
};

fnObtenerListaEntrada();

function fnObtenerListaEntrada() {
  let parametros = {};
  $.get("entrada", parametros).done(function (response) {
    if (dte) {
      dte.clear();
      dte.rows.add(response);
      dte.draw();
    } else {
      //window.alert(JSON.stringify(response));
      initListaEntrada(response);
    }
  });
}

function initListaEntrada(lista) {
  dte = $("#datatable_entrada").DataTable({
    order: [],
    columnDefs: [
      {
        targets: [11],
        orderable: false,
      },
    ],
    data: lista,
    columns: [
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.d_entrada + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' + data.nombre_categoria + "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' + data.cantidad_unidad + "</div>"
          );
        },
      },

      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' +
            data.tipo_unidad +
            " DE " +
            data.valor_unidad +
            " UNIDADES</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' + data.nombre_producto + "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.nombre_marca + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' +
            data.modelo +
            "/" +
            data.medida +
            "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.color + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' +
            data.created_at.substring(0, 10) +
            "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' + data.estado_conservacion + "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.name + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          let id = data.idde;
          let nombre = data.name;
          var btn = "";
          btn +=
            "<button type='button' onclick=\"fn_modificar('" +
            id +
            "', '" +
            nombre +
            "')\" class='btn btn-warning btn-circle btn-sm'><i class='fas fa-pencil-alt'></i></button>";
          btn +=
            "<button type='button' onclick=\"fn_eliminar('" +
            id +
            "','" +
            nombre +
            "')\" class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></button>";
          return "" + btn;
        },
      },
    ],
  });
}
function fnAgregarListaProducto() {
  $("#modal-add-producto").modal("show");
}

function fnAgregarProductoTemp() {
  fnObtnerListaTempProductos();
  $("#modal-add-producto").modal("hide");
}

$(document).ready(function () {
  $("#btn-modal-producto").click(function () {
    fnAgregarListaProducto();
  });
  $("#btn-modal-agregar_producto").click(function () {
    fnAgregarProductoTemp();
  });
});
</script>

<style>
</style>

