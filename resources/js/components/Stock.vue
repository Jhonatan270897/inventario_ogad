<template>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col-8">
          <h6 class="m-0 font-weight-bold text-primary">Inventario</h6>
        </div>
        <div class="col-4 text-right">
          <button type="button" class="btn btn-sm btn-primary">Imprimir</button>
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
              <th>Categoría</th>
              <th>Total Unidades</th>
              <th>Denominacion</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Descripcion</th>
              <th>Color</th>
              <th>Estado Conservación</th>
              <th style="width: 10%">Opciones</th>
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
              <td>&nbsp;</td>
            </tr>
            <tr>
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
            <tr>
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
            <tr>
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
            <tr>
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
            <tr>
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
            <tr>
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
</template>
<script>
let dta;

export default {
  data: function () {
    return {
      opcion: "",
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
    resetForm() {
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

fnObtenerListaPrincipal();

function fnObtenerListaPrincipal() {
  let parametros = {};
  $.get("stock", parametros).done(function (response) {
    if (dta) {
      dta.clear();
      dta.rows.add(response);
      dta.draw();
    } else {
      /* window.alert(JSON.stringify(response));*/
      initLista(response);
    }
  });
}
function initLista(lista) {
  dta = $("#datatable_stock").DataTable({
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
            "<button type='button' onclick=\"fnModificar('" +
            id +
            "', '" +
            nombre +
            "')\" class='btn btn-light btn-circle btn-sm mr-1'><i class='fas fa-pencil-alt'></i></button>";
          btn +=
            "<button type='button' onclick=\"fnEliminar('" +
            id +
            "','" +
            nombre +
            "')\" class='btn btn-light btn-circle btn-sm mr-1'><i class='fas fa-trash'></i></button>";
          return "" + btn;
        },
      },
    ],
  });
}
</script>

<style>
</style>

