<template>
  <div>
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
                  <label for="">Detalles del ingreso</label>
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
                <button type="button" class="btn btn-sm btn-primary">
                  Agregar
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table table-bordered"
                id="datatable_entrada_productos"
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
                    <th style="width: 10%">Opciones</th>
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
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Denominacion</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripcion</th>
                    <th>Color</th>
                    <th>Fecha</th>
                    <th>Detalles</th>
                    <th>Estado Conservación</th>
                    <th>Detalle General</th>
                    <th>Detalle Producto</th>
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
  </div>
</template>
<script>
/*VAriables globales */
let dts;
let dt1;

export default {
  data: function () {
    return {
      producto_seleccionado: "",
      producto: [],
      opcion_stock: "",
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
    reset_producto() {},
    reset_stock() {
      this.stock = {
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
      };
    },
  },
};

fnObtenerListaSalida();

/*Tabla para mostrar los productos temproales seleccionados a ingresar */

function initListaTempSalida(lista) {
  dt1 = $("#datatable_entrada_productos").DataTable({
    info: false,
    paging: false,
    lengthChange: false,
    searching: false,
    order: [],
    columnDefs: [
      {
        targets: [8],
        orderable: false,
      },
    ],
    data: lista,
    columns: [
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' + data.nombre_categoria + "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.cantidad + "</div>";
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
          return '<div class="RowsTituloTest">' + data.modelo + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.detalles + "</div>";
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
            '<div class="RowsTituloTest">' + data.estado_conservacion + "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          let id = data.id;
          let nombre = data.cantidad;
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

/*Tabla para mostrar la lista e productos ingresados tablas entrada_almacen,detalle_entrada*/

function fnObtenerListaSalida() {
  let parametros = {};
  $.get("salida", parametros).done(function (response) {
    if (dts) {
      dts.clear();
      dts.rows.add(response);
      dts.draw();
    } else {
      /* window.alert(JSON.stringify(response));*/
      initListaSalida(response);
    }
  });
}

function initListaSalida(lista) {
  dts = $("#datatable_salida").DataTable({
    order: [],
    columnDefs: [
      {
        targets: [12],
        orderable: false,
      },
    ],
    data: lista,
    columns: [
      {
        data: function (data, type, dataToSet) {
          return (
            '<div class="RowsTituloTest">' + data.nombre_categoria + "</div>"
          );
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.cantidad + "</div>";
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
          return '<div class="RowsTituloTest">' + data.modelo + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.detalles + "</div>";
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
          return '<div class="RowsTituloTest">' + data.d_d_entrada + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.name + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          return '<div class="RowsTituloTest">' + data.d_entrada + "</div>";
        },
      },
      {
        data: function (data, type, dataToSet) {
          let id = data.id;
          let nombre = data.cantidad;
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
</script>

<style>
</style>

