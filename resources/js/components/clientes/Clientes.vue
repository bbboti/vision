<template>

  <div>
        <div class="page-header">
          <div class="container-fluid">
            <div class="d-flex    align-items-center justify-content-between " >
                <h2 class="h5 no-margin-bottom">CLIENTES</h2>
                <button href="" class="btn btn-primary ladda-button float-right" data-toggle="modal" data-target="#modal" @click.prevent="vaciarForm()">Crear</button>
            </div>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="block">
                <div class="table-responsive">
                  <table id="" style="width: 100%;" class="table">
                    <thead>
                      <tr role="row">
                        <th>Apellido / Nombre</th>
                        <th>DNI</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Productor</th>
                        <th>Edicion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="cliente in clientes" :key="cliente.id" role="row" class="odd">
                        <td v-if="cliente.razon_social === null">{{cliente.apellido}} {{cliente.nombre}}</td>
                        <td v-else>{{cliente.razon_social}}</td>
                        <td>{{cliente.nro_dni}} </td>
                        <td>{{cliente.celular}} </td>
                        <td>{{cliente.email}} </td>
                        <td>{{cliente.productores.apellido}} {{cliente.productores.nombre}} </td> 
                        <td>
                          <a href=""  @click.prevent="modoEdicion(cliente.id)" class="fa fa-edit"></a>
                          <a href=""  @click.prevent="borrarCliente(cliente.id)" class="fa fa-trash"></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </section>
        <modal-clientes :cliente='cliente'></modal-clientes>

    </div>


</template>
<script>
import ModalClientes from '/ModalClientes'

// import { helpers } from "vuelidate/lib/validators";
// const alpha = helpers.regex("alpha", /^[a-zA-Z ]*$/);
// import { required, numeric, email, minValue } from "vuelidate/lib/validators";

export default {
    components:{
        ModalClientes
    },
  data() {
    return {
      clientes: {},
      productores: {},
      productor: {},
      localidades: [],
      cliente: {
        tipo_persona: "",
        nombre: "",
        apellido: "",
        razon_social: "",
        tipo_doc: "",
        nro_dni: "",
        sexo: "",
        nacimiento: "",
        condicion_fiscal: "",
        cuit: "",
        registro: "",
        vencimiento_registro: "",
        email: "",
        email_alt: "",
        direccion: "",
        direccion_nro: "",
        direccion_piso: "",
        direccion_depto: "",
        localidad_id: "",
        barrio_cerrado: "",
        lote: "",
        celular: "",
        telefono_1: "",
        telefono_2: "",
        img_registro: "",
        observaciones_1: "",
        obeservaciones_2: "",
        productor_id: ""
      },
      modoEditar: false
    };
  },
    validations() {
        if (this.cliente.tipo_persona === 'Persona Fisica'){
            return {
                cliente: {
                    nombre: {
                        required,
                        alpha
                    },
                    apellido: {
                        required,
                        alpha
                    },
                    nro_dni: {
                        required,
                        numeric
                    },
                    nacimiento: {
                        required
                    },
                    email: {
                        email
                    },
                    sexo: {
                        required
                    },
                    nacimiento: {
                        required
                    },
                    email: {
                        email
                    },
                    email_alt: {
                        email
                    },
                    direccion: {
                        required
                    },
                    direccion_nro: {
                        required
                    },
                    localidad_id:{
                            required
                    },
                    productor_id: {
                        required
                    }
                }
            } 
                } else {
                return {
                    cliente: {
                        nombre: {
                            alpha
                        },
                        apellido: {
                            alpha
                        },
                        nro_dni: {
                            numeric
                        },
                        nacimiento: {
                        },
                        email: {
                            email
                        },
                        cuit: {
                            required
                        },
                        sexo: {
                        },
                        nacimiento: {
                        },
                        email: {
                            email
                        },
                        email_alt: {
                            email
                        },
                        direccion: {
                            required
                        },
                        direccion_nro: {
                            required
                        },
                        localidad_id:{
                            required
                        },
                        productor_id: {
                            required
                        },
                        razon_social: {
                            required
                        }
                        }
                }
            }
  },
  methods: {
    crearCliente() {
      let self = this;
      this.$Progress.start();
      
        axios
          .post("http://127.0.0.1:8000/api/clientes", self.cliente)
          .then(() => {
            $("#modal").modal("hide");
            this.$Progress.finish();
            this.cliente = {};
            this.cargarClientes();
            toast({
              type: "success",
              title: "Cliente creado!"
            });
          })
          .catch(error => {
            console.log(error.response.data);
            this.errors = error.response.data;
          });
      
    },
    cambiarACondicionJuridica() {
      this.tipo_persona = 2;
    },
    vaciarForm() {
      this.cliente = {
        tipo_persona: "Persona Fisica",
        condicion_fiscal: "CONSUMIDOR FINAL",
        tipo_doc: "DNI"
      };
      this.errors = [];
      this.modoEditar = false;
    },
    updateCliente(id) {
      let self = this;
      axios
        .put("http://127.0.0.1:8000/api/clientes/" + id, this.cliente)
        .then(() => {
          $("#modal").modal("hide");
          this.cargarClientes();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    modoEdicion(id) {
      (this.modoEditar = true), $("#modal").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/clientes/" + id)
        .then(function(response) {
          self.cliente = response.data.data;
        })
        .catch(e => console.log(e));
    },
    borrarCliente(id) {
      axios.delete("http://127.0.0.1:8000/api/clientes/" + id).then(() => {
        this.cargarClientes();
        console.log("borado!");
      });
    },
    cargarClientes() {
      let self = this;
      axios.get("http://127.0.0.1:8000/api/clientes").then(function(response) {
        self.clientes = response.data.data;
      });
    },
    cargarProductores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/productores")
        .then(function(response) {
          self.productores = response.data.data;
        });
    },
    cargarLocalidades() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/localidades")
        .then(function(response) {
          self.localidades = response.data.data;
        });
    },
    nombreYCodigo({ nombre, codigo_postal }) {
      return `${nombre} — (CP:${codigo_postal})`;
    }
  },
  created() {
    this.cargarClientes();
    this.cargarProductores();
    this.cargarLocalidades();
  }
};
</script>
