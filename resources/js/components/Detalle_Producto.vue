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
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="modal-add-detalle_producto"
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
  </div>
</template>

<script>
/*Variables globales */
let dt;

export default {
  data: function () {
    return {
      opcion_detalle_producto: "",
      detalle_productos: [],
      detalle_producto: {
        idDetalleProducto: 0,
        nombre_producto: "",
        descripcion: "",
        estado_activo: "",
      },
    };
  },
  mounted() {
    this.listar();
  },
  methods: {
    async listar() {
      const res = await axios.get("detalle_producto");
      if (dt) {
        dt.clear();
        dt.rows.add(res.data);
        dt.draw();
      } else {
        this.gtabla(res.data);
      }
    },
    gtabla(lista) {
      dt = $("#datatable_detalle_producto").DataTable({
        order: [],
        columnDefs: [
          {
            targets: [3],
            orderable: false,
          },
        ],
        data: lista,
        columns: [
          {
            data: function (data, type, dataToSet) {
              return (
                '<div class="RowsTituloTest">' + data.nombre_producto + "</div>"
              );
            },
          },
          {
            data: function (data, type, dataToSet) {
              return (
                '<div class="RowsTituloTest">' + data.descripcion + "</div>"
              );
            },
          },
          {
            data: function (data, type, dataToSet) {
              return (
                '<div class="RowsTituloTest">' + data.estado_activo + "</div>"
              );
            },
          },
          {
            data: function (data, type, dataToSet) {
              let id = data.id;
              let nombre = data.nombre_producto;
              var btn = "";
              btn +=
                "<button type='button' @click=modificar('" +
                id +
                "', '" +
                nombre +
                "')\" class='btn btn-warning btn-circle btn-sm'><i class='fas fa-pencil-alt'></i></button>";
              btn +=
                "<button type='button' @click=eliminar('" +
                id +
                "')\" class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></button>";
              return "" + btn;
            },
          },
        ],
      });
    },
  },
};
/*
fnObtenerListaDetalleProducto();

function fnObtenerListaDetalleProducto() {
  $.get("detalle_producto").done(function (response) {
    if (dtdp) {
      dtdp.clear();
      dtdp.rows.add(response);
      dtdp.draw();
    } else {
      //window.alert(JSON.stringify(response));
      initListaDetalleProducto(response);
    }
  });
}

function initListaDetalleProducto(lista) {
  dtdp = $("#datatable_detalle_producto").DataTable({
    order: [],
    columnDefs: [
      {
        targets: [3],
        orderable: false,
      },
    ],
    data: lista,
    columns: [
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' + data.nombre_producto + "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.descripcion + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.estado_activo + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          let id = data.id;
          let nombre = data.nombre_producto;
          var btn = "";
          btn +=
            "<button type='button' onclick=\"fn_modificar('" +
            id +
            "', '" +
            nombre +
            "')\" class='btn btn-warning btn-circle btn-sm'><i class='fas fa-pencil-alt'></i></button>";
          btn +=
            "<button type='button' @click=eliminar('" +
            id +
            "')\" class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></button>";
          return "" + btn;
        },
      },
    ],
  });
}
*/
function fnAgregarDetalleProducto() {
  opcion_detalle_producto = "AGREGAR";
  $("#modal-add-detalle_producto").modal("show");
}

function fnAceptarAgregarDetalleProducto() {
  $("modal-add-detalle_producto").modal("hide");
}

$(document).ready(function () {
  $("#btn-modal-add-detalle-producto").click(function () {
    fnAgregarDetalleProducto();
  });
});
</script>