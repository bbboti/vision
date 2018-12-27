<template>
    <div>
          <div class="page-header">
          <div class="container-fluid">
            <div class="d-flex    align-items-center justify-content-between " >
                <h2 class="h5 no-margin-bottom">ORGANIZADORES</h2>
                 <button href="" class="btn btn-primary ladda-button" data-toggle="modal" data-target="#modal" @click.prevent="vaciarForm()">Crear</button>
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
                  <table id="" style="width: 100%;" class="table table-striped">
                    <thead>
                                        <tr role="row">
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Cuit</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Activo</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="organizador in organizadores" :key="organizador.id" role="row" class="odd">
                                            <td>{{organizador.apellido}}</td>
                                            <td> {{organizador.nombre}} </td>
                                            <td> {{organizador.cuit}} </td>
                                            <td> {{organizador.email}} </td>
                                            <td> {{organizador.telefono_2}} </td>
                                            <td v-if="organizador.activo == 1">SI</td>
                                            <td v-else>NO</td>
                                            <td>
                                                <a href="" @click.prevent="modoEdicion(organizador.id)" class="fa fa-edit"></a>
                                                <a href="" @click.prevent="borrarOrganizador(organizador.id)" class="fa fa-trash"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </section>
                <!-- /.box-body -->
        <!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form @submit.prevent="modoEditar ? updateOrganizador(organizador.id) : crearOrganizador()">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Organizador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="nombre" class=" control-label">Nombre</label>
                                                        <div class="">
                                                                <input type="text" v-model="organizador.nombre" class="form-control form-control-sm" id="nombre" name="nombre">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="apellido" class="control-label">Apellido</label>
                                                        <div class="">
                                                                <input type="text" v-model="organizador.apellido" class="form-control form-control-sm" id="apellido" name="apellido" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="cuit" class="control-label">Cuit</label>
                                                        <div class="">
                                                                <input type="text" v-model="organizador.cuit" class="form-control form-control-sm" id="cuit" name="cuit" placeholder="">
                                                        </div>
                                                        </div>
                                                <div class="form-group">
                                                        <label for="matricula" class="control-label">Matricula</label>
                                                        <div class="">
                                                                <input type="text" v-model="organizador.matricula" class="form-control form-control-sm" name="matricula">
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="email" class="control-label">Email</label>
                                                        <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                                </div>
                                                                <input name="email" v-model="organizador.email" type="email" class="form-control form-control-sm" id="email" placeholder="Email">
                                                        </div>
                                                </div>


                                                <div class="form-group">
                                                        <label>Telefono</label>
                                                        <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" v-model="organizador.telefono_1" class="form-control form-control-sm" id="telefono_1" name="telefono_1" placeholder="Telefono">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label>Celular</label>
                                                        <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" v-model="organizador.telefono_2" id="telefono_2" name="telefono_2" placeholder="Celular">
                                                        </div>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input radio-danger" type="radio" value=1 v-model="organizador.activo">
                                                    <label class="form-check-label">Activo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value=0 v-model="organizador.activo">
                                                    <label class="form-check-label">Inactivo</label>
                                                </div>  
                                        </div>
                                        </div>
            </div>
            <div class="modal-footer">
                <button type="submit" v-show="!modoEditar" class="btn btn-primary">Crear</button>
                <button type="submit" v-show="modoEditar" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
        </div>


    </div>


</template>
<script>
export default {
  data() {
    return {
      organizadores: {},
      organizador: {
        nombre: "",
        apellido: "",
        cuit: "",
        matricula: "",
        email: "",
        telefono_1: "",
        telefono_2: "",
        activo: ""
      },
      modoEditar: false
    };
  },
  methods: {
    crearOrganizador() {
      //       console.log(this.organizador);
      let self = this;
      axios
        .post(
          "http://127.0.0.1:8000/api/administracion/organizadores",
          self.organizador
        )
        .then(() => {
          $("#modal").modal("hide");
          this.organizador = {};
          //   this.organizador.activo = 1;
          this.cargarOrganizadores();
        })
        .catch(e => console.log(e));
    },
    vaciarForm() {
      this.organizador = {};
      this.modoEditar = false;

      // this.organizador.activo = 1;
    },
    updateOrganizador(id) {
      let self = this;
      axios
        .put(
          "http://127.0.0.1:8000/api/administracion/organizadores/" + id,
          this.organizador
        )
        .then(() => {
          $("#modal").modal("hide");
          this.cargarOrganizadores();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    modoEdicion(id) {
      (this.modoEditar = true), $("#modal").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/organizadores/" + id)
        .then(function(response) {
          self.organizador = response.data.data;
        })
        .catch(e => console.log(e));
    },
    borrarOrganizador(id) {
      axios
        .delete("http://127.0.0.1:8000/api/administracion/organizadores/" + id)
        .then(() => {
          this.cargarOrganizadores();
          console.log("borado!");
        });
    },
    cargarOrganizadores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/organizadores")
        .then(function(response) {
          self.organizadores = response.data.data;
        });
    }
  },
  created() {
    this.cargarOrganizadores();
  }
};
</script>
