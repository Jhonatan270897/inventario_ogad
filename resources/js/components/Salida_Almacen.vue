<template>
  <div>
    <!--Contenido pagina salida -->
    <div class="row">
      <div class="col-3">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row align-items-center">
              <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">
                  Generalidades de salida
                </h6>
              </div>
              <div class="col-6 text-right">
                <button
                  type="button"
                  class="btn btn-sm btn-primary"
                  @click="guardarSa"
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
                    v-model="stock.detalle"
                  />
                  <br>
                  <label>Persona</label>
                  <select v-model="stock.idp" class="form-control" required>
                    <option value="">--Seleccionar--</option>
                    <option
                      v-for="lp in lista_persona"
                      :key="lp.id"
                      :value="lp.id"
                    >
                      {{ lp.nombre_persona }} {{ lp.a_paterno }}
                      {{ lp.a_materno }}
                    </option>
                  </select>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-9">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row align-items-center">
              <div class="col-4">
                <h6 class="m-0 font-weight-bold text-primary">
                  Productos de salida
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
                    <th>Cantidad Total</th>
                    <th>Cantidad a Sacar</th>
                    <th>Denominacion</th>
                    <th>Marca/Modelo/Marca/Color</th>
                    <th>Estado Salida</th>
                    <th>-</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="ptemp in lista_guardar_producto"
                    :key="ptemp.idtemp"
                  >
                    <td>
                      {{ ptemp.nombre_categoria }}
                    </td>
                    <td>
                      {{ ptemp.cantidad_total }} {{ ptemp.tipo_unidad }} de
                      {{ ptemp.valor_unidad }}
                    </td>
                    <td>
                      {{ ptemp.cantidad_salida }} {{ ptemp.tipo_unidad_salida }}
                    </td>
                    <td>
                      {{ ptemp.nombre_producto }}
                    </td>
                    <td>
                      {{ ptemp.nombre_marca }}/{{ ptemp.modelo }}/{{
                        ptemp.medida
                      }}/{{ ptemp.color }}
                    </td>
                    <td>{{ ptemp.estado_conservacion_salida }}</td>
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
                  Lista de productos de salida
                </h6>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table"
                id="datatabale_salida"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
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
                  <tr v-for="lds in lista_detalles_salida" :key="lds.id">
                    <td>{{ lds.nombre_categoria }}</td>
                    <td>{{ lds.cantidad_salida }}</td>
                    <td>
                      {{ lds.tipo_unidad }}
                    </td>
                    <td>{{ lds.nombre_producto }}</td>
                    <td>{{ lds.nombre_marca }}</td>
                    <td>{{ lds.modelo }}/{{ lds.medida }}</td>
                    <td>{{ lds.color }}</td>
                    <td>{{ lds.created_at }}</td>
                    <td>{{ lds.estado_conservacion }}</td>
                    <td>{{ lds.name }}</td>
                    <td>
                      <button
                        type="button"
                        @click="
                          modificarde = true;
                          abrirModalde(salida);
                        "
                        class="btn btn-warning btn-circle btn-sm"
                      >
                         <i class="material-icons">edit</i>
                      </button>
                      <button
                        type="button"
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
      <div
        class="modal-dialog modal-lg"
        style="
          overflow-y: scroll;
        "
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title-notification">
              Agregar Producto
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
              <br />
              <div class="col-6">
                <div class="form-group">
                  <label class="form-control-label">Productos</label>
                  <input
                    class="form-control"
                    id="idNombreProducto"
                    type="text"
                    :value="stock.nombre_producto"
                    :disabled="true"
                  />
                </div>
              </div>
              <br />
              <div class="col-2">
                <label> Cantidad </label>
                <input
                  class="form-control"
                  id="IdCantidadSalida"
                  type="number"
                  v-model="stock.cantidad_salida"
                />
              </div>
              <div class="col-2">
                <label> U/Medida </label>
                <select
                  v-model="stock.tipo_unidad_salida"
                  class="form-control"
                  required
                >
                  <option value="">--Seleccionar--</option>
                  <option v-for="um in lista_unidad_medida" :key="um.nombre_um">
                    {{ um.nombre_um }}
                  </option>
                </select>
              </div>
              <div class="col-2">
                <label> Estado Salida </label>
                <select
                  v-model="stock.estado_conservacion_salida"
                  class="form-control"
                  required
                >
                  <option value="">--Seleccionar--</option>
                  <option v-for="ec in lista_ec" :key="ec.nombre_ec">
                    {{ ec.nombre_ec }}
                  </option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-control-label"
                  >Marca/Modelo/Medida/Color</label
                >
                <input
                  class="form-control"
                  id="idModeloMarcaColor"
                  type="text"
                  :value="
                    stock.nombre_marca +
                    '/' +
                    stock.modelo +
                    '/' +
                    stock.medida +
                    '/' +
                    stock.color
                  "
                  :disabled="true"
                />
              </div>
              <div class="col-6">
                <label class="form-control-label">Stock</label>
                <input
                  class="form-control"
                  id="inputStock"
                  type="text"
                  :value="
                    stock.cantidad_total +
                    ' ' +
                    stock.tipo_unidad +
                    ' de ' +
                    stock.valor_unidad +
                    ' unidades'
                  "
                  :disabled="true"
                />
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <h6 class="m-0 font-weight-bold text-primary">
                          Lista de productos en stock
                        </h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        class="table"
                        id="datatabale_salida"
                        width="100%"
                        cellspacing="0"
                      >
                        <thead>
                          <tr>
                            <th>Detalle General</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Medida</th>
                            <th>Denominacion/Marca/Modelo/Medida/Color</th>
                            <th style="width: 5%">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="stk in lista_stock" :key="stk.id">
                            <td>{{ stk.d_entrada }}</td>
                            <td>{{ stk.nombre_categoria }}</td>
                            <td>{{ stk.cantidad_total }}</td>
                            <td>
                              {{ stk.tipo_unidad }} de
                              {{ stk.valor_unidad }}
                            </td>
                            <td>
                              {{ stk.nombre_producto }}/{{
                                stk.nombre_marca
                              }}/{{ stk.modelo }}/{{ stk.medida }}/{{
                                stk.color
                              }}
                            </td>
                            <td>
                              <button
                                type="button btn-success btn-circlton"
                                @click="rellenarDatosProducto(stk)"
                                class="btn e btn-sm"
                              >
                                <i class="material-icons">arrow_circle_up</i>
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
      idtemp: 0,
      modalde: 0,
      modalp: 0,
      lista_stock: [],
      lista_ec: [{ nombre_ec: "Abierto" }, { nombre_ec: "Sellado" }],
      lista_unidad_medida: [
        { nombre_um: "Unidades" },
        { nombre_um: "Cajas" },
        { nombre_um: "Pauqetes" },
      ],
      /*Lista de creacion de tablas */
      lista_guardar_producto: [],
      /*Datos de formularios */
      lista_detalles_salida: [],
      stock: {
        ids: 0,
        idp: 0,
        cantidad_salida: 0,
        valor_unidad: 0,
        detalle: "",
        estado_conservacion: "",
        cantidad_total: 0,
        tipo_unidad: "",
        nombre_producto: "",
        nombre_marca: "",
        modelo: "",
        medida: "",
        color: "",
        idtemp: 0,
        tipo_unidad_salida: "",
        estado_conservacion_salida: "",
      },
      salida: {},
      lista_persona: {},
      lista_salida: {},
    };
  },
  methods: {
    /*Crud*/
    async listarPersonas() {
      const res = await axios.get();
    },
    async listarSalida() {
      const res = await axios.get("/salida");
      this.lista_detalles_salida = res.data;
    },
    async listars() {
      const res = await axios.get("/stock");
      this.lista_stock = res.data;
    },

    async guardarSa() {
      if (this.lista_guardar_producto.length !== 0) {
        const res1 = await axios.post("/sal", this.stock);
        for (
          let index = 0;
          index < this.lista_guardar_producto.length;
          index++
        ) {
          this.lista_guardar_producto[index].idsa = res1.data;
          window.alert(res1.data);
          const res3 = await axios.post(
            "/salida",
            this.lista_guardar_producto[index]
          );
          /*Ingresar detalle_producto*/
        }
      } else {
        window.alert("Vacioooooo");
      }
      /*  this.reset_insertGeneral();*/
      this.listars();
    },

    registrarNuevoProd() {
      if (this.isDisabled) {
        this.cbxproduc = "0";
      } else {
        this.isDisabled = true;
        this.reset_temp();
      }
    },
    agregarProducto() {
      if (
        this.stock.cantidad_salida == 0 ||
        this.stock.stado_conservacion == ""
      ) {
        console.log("Respuesta rellenar datos necesarios");
      } else {
        this.lista_guardar_producto.push({
          ids: this.stock.ids,
          idsa: 0,
          cantidad_total: this.stock.cantidad_total,
          nombre_producto: this.stock.nombre_producto,
          nombre_categoria: this.stock.nombre_categoria,
          nombre_marca: this.stock.nombre_marca,
          medida: this.stock.medida,
          cantidad_salida: this.stock.cantidad_salida,
          tipo_unidad: this.stock.tipo_unidad,
          tipo_unidad_salida: this.stock.tipo_unidad_salida,
          detalles: this.stock.d_entrada,
          estado_conservacion_salida: this.stock.estado_conservacion_salida,
          valor_unidad: this.stock.valor_unidad,
          idtemp: this.idtemp,
        });
        this.stock.idtemp = Number(this.stock.idtemp) + 1;
        this.cerrarModalp();
      }
    },
    eliminarProducto(arry = [], id) {
      arry.forEach(function (currentValue, index, arr) {
        if (arry[index].idtemp == id) {
          arry.splice(index, 1);
        }
      });
    },

    rellenarDatosProducto(data) {
      this.stock.ids = data.ids;
      this.stock.detalle = data.d_detalle;
      this.stock.estado_conservacion = data.estado_conservacion;
      this.stock.cantidad_total = data.cantidad_total;
      this.stock.tipo_unidad = data.tipo_unidad;
      this.stock.nombre_producto = data.nombre_producto;
      this.stock.nombre_marca = data.nombre_marca;
      this.stock.modelo = data.modelo;
      this.stock.medida = data.medida;
      this.stock.color = data.color;
      this.stock.nombre_categoria = data.nombre_categoria;
      this.stock.valor_unidad = data.valor_unidad;
    },
    /*Modales*/
    abrirModalp(data = {}) {
      this.modalp = 1;
      this.listars();
      this.idtemp = this.stock.idtemp;
    },
    cerrarModalp() {
      this.modalp = 0;
      this.idtemp = 0;
    },
  },
  mounted() {
    axios.get("persona").then((response) => {
      this.lista_persona = response.data;
    });
  },
  created() {
    this.listarSalida();
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


